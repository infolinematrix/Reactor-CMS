<form action="<?php echo e(route('reactor.' . $key . '.search')); ?>" method="get" class="sidebar-form">
    <div class="input-group">
        <input type="text" name="q" class="form-control" value="<?php echo e(request('q')); ?>"
               placeholder="<?php echo e(trans($key . '.search')); ?>...">
        <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
    </div>
</form>

