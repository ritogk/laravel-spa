<template>
  <b-button variant="primary" @click="download()">
    <slot name="name">ダウンロード</slot>
  </b-button>
</template>

<script>
  export default {
    props: {
      dlUrl: String,
    },
    methods: {
      download() {
        axios.post(this.dlUrl, {},{
              responseType: 'arraybuffer',
              headers: {
                'Accept': 'application/excel'
              }
        }).then(response => {
            const url = window.URL.createObjectURL(new Blob([response.data]));
            const link = document.createElement('a');
            link.href = url;
            link.setAttribute('download', this.getFileNameFromContentDisposition(response.headers["content-disposition"]));
            document.body.appendChild(link);
            link.click();
        });
      },
      getFileNameFromContentDisposition(disposition) {
        const filenameRegex = /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/; // 正規表現でfilenameを抜き出す
        const matches = filenameRegex.exec(disposition);
        if (matches != null && matches[1]) {
          const fileName = matches[1].replace(/['"]/g, '');
          return decodeURI(fileName) // 日本語対応
        } else {
          return null
        }
      }
    }
  }
</script>