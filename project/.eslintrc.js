module.exports = {
    root: true,
    "env": {
        "browser": true,
        "commonjs": true,
        "es2021": true
    },
    "extends": [
        'plugin:vue/essential',
        'eslint:recommended',
        '@vue/typescript/recommended',
        '@vue/prettier',
        '@vue/prettier/@typescript-eslint',
    ],
    "parserOptions": {
        "ecmaVersion": 12,
        "sourceType": "module"
        //"parser": "@typescript-eslint/parser",
        //"extends": "eslint:recommended",
        //"parser": "vue-eslint-parser"
    },
    "plugins": [
        "vue",
        "@typescript-eslint"
    ],
    "rules": {
        'no-console': process.env.NODE_ENV === 'production' ? 'warn' : 'off',
        'no-debugger': process.env.NODE_ENV === 'production' ? 'warn' : 'off',
    }
};
