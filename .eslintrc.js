module.exports = {
  root: true,
  extends: "eslint:recommended",
  globals: {
    wp: true,
    mina: true,
    Snap: true
  },
  env: {
    browser: true,
    es6: true,
    jquery: true
  },
  parserOptions: {
    sourceType: "module",
    ecmaVersion: 8
  },
  rules: {
    "no-console": 1,
    "no-debugger": 1,
    "no-unused-vars": ["error", { varsIgnorePattern: "Logo" }]
  }
};
