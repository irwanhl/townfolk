
<!--post modal-->

<style>
    .image-upload > input
    {
        display: none
    }
</style>

<div id="postModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			Update Status
      </div>
      <div class="modal-body">
          <form class="form center-block">
            <div class="form-group">
              <textarea class="form-control input-lg" autofocus="" placeholder="What do you want to share?"></textarea>
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div>
            <button class="btn btn-primary btn-sm" data-dismiss="modal" aria-hidden="true">Post</button>
            <ul class="pull-left list-inline">
                <li><div class="image-upload"><label for="file-input"><i class="fa fa-video-camera"></i></label><input id="file-input" type="file"/></div></li>
                <li><div class="image-upload"><label for="file-input"><i class="fa fa-picture-o"></i></label><input id="file-input" type="file"/></div></li>
                <li><div class="image-upload"><label for="file-input"><i class="fa fa-map-marker"></i></label><input id="file-input" type="submit"/></div></li>
            </ul>
          </div>	
      </div>
  </div>
  </div>
</div>