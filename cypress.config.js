const { defineConfig } = require("cypress");

module.exports = defineConfig({
  projectId: 'onsy3m',
  e2e: {
    setupNodeEvents(on, config) {
      // implement node event listeners here
    },
  },
});
