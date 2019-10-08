<li class="nav-item">
    <a class="nav-link <?php if(isset($subnavmenu) && $subnavmenu=="lifestylemovies") echo ' active';?>" href="<?= site_url('lifestyle/movies') ?>">Movies</a>
</li>
<li class="nav-item">
    <a class="nav-link <?php if(isset($subnavmenu) && $subnavmenu=="lifestyleevents") echo ' active';?>" href="<?= site_url('lifestyle/events') ?>">Events</a>
</li>
<li class="nav-item">
    <a class="nav-link <?php if(isset($subnavmenu) && $subnavmenu=="lifestyletravels") echo ' active';?>" href="<?= site_url('lifestyle/travels') ?>">Travels</a>
</li>
<li class="nav-item">
    <a class="nav-link <?php if(isset($subnavmenu) && $subnavmenu=="lifestyletourist") echo ' active';?>" href="<?= site_url('lifestyle/tourist') ?>">Tourism</a>
</li>
<li class="nav-item">
    <a class="nav-link <?php if(isset($subnavmenu) && $subnavmenu=="lifestyleblogs") echo ' active';?>" href="<?= site_url('lifestyle/blogs') ?>">Blog</a>
</li>