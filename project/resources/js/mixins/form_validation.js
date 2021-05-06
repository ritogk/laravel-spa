export default {
  methods: {
    // バリデーションエラーの判別用
    input_state: function(error_msg) {
      return error_msg ? false : null;
    },
    // requestエラー値をメッセージに反映
    apply_request_errors: function(errors, request_errors) {
      for (const [key, value] of Object.entries(errors)) {
        if(request_errors[key] !== undefined){
          errors[key] = request_errors[key][0];
        }else{
          errors[key] = "";
        }
      }
      return errors;
    },
    // 楽観チェックメッセージ取得
    msg_exclusive: function(request_errors) {
      return (request_errors.updated_at ? request_errors.updated_at[0] : "" );
    },
  }
}