var app = new Vue({
      el: '#ping',
      data: {
        message: 'Hello',
        errors: '',
        type: '',
        loading: false,
        headers: null
      },
      computed: {
        panelStyle () {
          return this.type == 'origin' ? 'panel panel-primary' : 'panel panel-success'
        }
      },
      methods: {
        pingOrigin (e) {
          this.type = 'origin';
          this.loading = true;
          this.headers = null;
          fetch('/ping.php?type=origin').then(res => res.json()).then(headers => {
            this.loading = false;
            this.errors = '';
            this.headers = headers;
          }).catch(err => {
            this.loading = false;
            this.headers = null;
            this.errors = 'Something went wrong with the request. Please try again.'
          })
        },
        pingCloudflare (e) {
          this.type = 'cloudflare';
          this.loading = true;
          this.errors = '';
          this.headers = null;
          fetch('/ping.php?type=cloudflare').then(res => res.json()).then(headers => {
            this.loading = false;
            this.errors = '';
            this.headers = headers;
          }).catch(err => {
            this.loading = false;
            this.headers = null;
            this.errors = 'Something went wrong with the request. Please try again.'
          })
        }
      }
    })