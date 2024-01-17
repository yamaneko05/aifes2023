<?php get_header(); ?>

<main>
  <h2><?php the_title(); ?></h2>
  <form action="<?php bloginfo("url") ?>/instagram-result" method="get">
  <select name="schedule" id="">
    <?php $terms = get_terms("schedule", array("hide_empty" => false,"parent" => 0)); ?>
    <?php foreach($terms as $term_parent): ?>
      <optgroup label="<?php echo $term_parent->name ?>">
      <?php $terms = get_terms("schedule", array("parent" => $term_parent->term_id)); ?>
      <?php foreach($terms as $term): ?>
        <option value="<?php echo $term->term_id ?>"><?php echo $term->name ?></option>
      <?php endforeach; ?>
        
      </optgroup>
    <?php endforeach; ?>
    </select>
  <input type="submit">
  </form>
</main>

<?php get_footer(); ?>