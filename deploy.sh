#!/bin/sh

RELEASE_NAME="$PREFIX-$COMMIT"
DOCUMENT_ROOT="$HOME_DIR/$BASE_DIR/$ROOT_DIR"
TARGET_DIR="$HOME_DIR/$BASE_DIR/$RELEASE_DIR/$RELEASE_NAME"
CLEANUP_DRY_RUN=0

# Generate release folder
mkdir -p "$TARGET_DIR"
if [ $? -ne 0 ]; then
  echo "Error creating release directory, exiting."
  exit 1
fi

# Unzip tar
tar -xf "$HOME_DIR/package-$COMMIT.tar.gz" -C "$TARGET_DIR/"
if [ $? -ne 0 ]; then
  echo "Error unzipping package, exiting."
  exit 1
fi

# Fix rights
chmod -R u+rwX,go+rX,go-w "$TARGET_DIR"
if [ $? -ne 0 ]; then
  echo "Error setting permissions, exiting."
  exit 1
fi

# Set symlink for document root
ln -sfn "$TARGET_DIR/$PUBLIC_FOLDER" "$DOCUMENT_ROOT"
if [ $? -ne 0 ]; then
  echo "Error creating symlink for document root, exiting."
  exit 1
fi

# Clean up releases
rm "$HOME_DIR/package-$COMMIT.tar.gz"

# Cleanup process
# Adjust 'head -n -2' to change the number of releases you keep
CURRENT_RELEASE=$(readlink -f "$DOCUMENT_ROOT")
FOLDERS_TO_REMOVE=$(find "$HOME_DIR/$BASE_DIR/$RELEASE_DIR/" -mindepth 1 -maxdepth 1 -type d ! -name "$(basename "$CURRENT_RELEASE")" ! -name "$(basename "$(readlink -f "$DOCUMENT_ROOT")")" -printf '%T+ %p\n' | sort | head -n -2 | cut -d' ' -f2-)

if [ "$CLEANUP_DRY_RUN" -eq 1 ]; then
    echo "Dry run enabled. The following folders would be removed:"
    echo "$FOLDERS_TO_REMOVE"
else
    echo "Removing folders..."
    echo "$FOLDERS_TO_REMOVE" | xargs rm -rf
    echo "Folders removed."
fi
echo "Deployment successful!"