  <nav id="crud--nav" class="text-center row">
      <div class="col-xs-6">
        <strong ng-click="nwc.setMode('c')">Create New</strong>
      </div>
      <div class="col-xs-6">
        <strong ng-click="nwc.setMode('u')" ng-hide="nwc.isUpdateListVisible">Edit Existing</strong>
      </div>
</nav>