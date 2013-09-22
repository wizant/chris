<form action="/" method="get" class="form-inline">
    <fieldset class="form-group">
        <label for="search" class="hidden">Search in <?php echo home_url( '/' ); ?></label>
        <input type="text" name="s" id="search" class="form-control" value="<?php the_search_query(); ?>" placeholder="Search" />
    </fieldset>
    <input type="submit" class="btn btn-default" value="Go" />
</form>