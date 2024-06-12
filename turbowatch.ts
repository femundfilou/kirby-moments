import { defineConfig } from "turbowatch";

export default defineConfig({
	project: __dirname,
	triggers: [
		{
			expression: ["match", "*.css", "basename"],
			name: "build",
			onChange: async ({ spawn }) => {
				await spawn`pnpm build:css`;
			},
		},
		{
			expression: ["match", "*.ts", "basename"],
			name: "build",
			onChange: async ({ spawn }) => {
				await spawn`pnpm build:ts`;
			},
		},
	],
});