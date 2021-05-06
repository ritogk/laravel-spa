export default {
  methods: {
    // 空文字判定
    isEmpty: function(val: any) {
      if (!val) {
        if (!((val === 0) || (val === false))) {
            return true;
        }
      }
      return false;
    },
    // 空オブジェクト判定
    isEmptyObject: function(obj: any) {
      return !Object.keys(obj).length;
    }
  }
}
