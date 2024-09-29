<template>
  <k-section :label="label" class="k-token-manager-field">
    <k-button icon="add" size="xs" slot="options" variant="filled" @click="createToken" :disabled="disabled">
      Create token
    </k-button>
    <k-collection :items="tokens" :empty="empty">
      <template #options="item">
        <k-button icon="trash" slot="options" @click="deleteToken(item.item.token)" :disabled="disabled" />
        <k-button icon="copy" slot="options" @click="copyToken(item.item.token)" :disabled="disabled" />
      </template>
    </k-collection>
  </k-section>
</template>

<script>
export default {
  props: {
    label: String,
    value: String,
    tokens: Array,
    empty: Object
  },
  computed: {
    disabled() {
      return !this.$panel.view.path.includes('account')
    }
  },
  methods: {
    createToken() {
      this.$dialog('kirby-moments/token/create');
    },
    copyToken(token) {
      this.$helper.clipboard.write(token)
      this.$panel.notification.open({ icon: 'copy', message: 'Token copied', theme: 'positive', type: 'success' });
    },
    deleteToken(token) {
      this.$dialog(`kirby-moments/token/${token}/delete`);
    }
  }
}

</script>
