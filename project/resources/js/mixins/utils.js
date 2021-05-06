export default {
  methods: {
    // 空文字判定
    isEmpty: function(val) {
      if (!val) {
        if (!((val === 0) || (val === false))) {
            return true;
        }
      }
      return false;
    },
    // 空オブジェクト判定
    isEmptyObject: function(obj) {
      return !Object.keys(obj).length;
    }
  }
}