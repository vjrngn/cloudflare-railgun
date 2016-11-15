<?php include('./shared/header.php'); ?>

<div class="container" id="ping">
  <div class="col-sm-4">
    <div class="panel panel-default">
      <div class="panel-heading text-center"><h4 class="panel-title">Tests</h4></div>
      <div class="panel-body">
        <div class="col-sm-6 text-center">
          <h4 class="text-primary">Origin</h4>
          <div class="col-sm-6 col-sm-offset-3">
            <button class="btn btn-primary" @click="pingOrigin">Test</button>
          </div>
        </div>
        <div class="col-sm-6 text-center">
          <h4 class="text-success">Cloudflare</h4>
          <div class="col-sm-6 col-sm-offset-3">
            <button class="btn btn-success" @click="pingCloudflare">Test</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-8">
    <div class="alert alert-danger" v-if="errors"> Oh snap! {{ errors }} </div>
    <div class="col-sm-6 col-sm-offset-3" v-if="loading">
      <h4 class="text-center">Requesting {{ this.type.toUpperCase() }}...</h4>
      <div class="progress">
        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
        </div>
      </div>
    </div>
    <div v-bind:class="panelStyle" v-show="headers">
      <div class="panel-heading">
        <div class="panel-title text-center">{{ type.toUpperCase() }} Response Headers</div>
      </div>
      <div class="panel-body table-responsive">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Header</th>
              <th>Value</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(header, index) in headers">
              <td>{{ index }}</td>
              <td>{{ header }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php include('./shared/footer.php'); ?>