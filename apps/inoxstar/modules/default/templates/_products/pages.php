<?php if ($pager->haveToPaginate()): ?>
  <?php echo link_to('&laquo;', $this->url.'&page='.$pager->getFirstPage()) ?>
  <?php echo link_to('&lt;', $this->url.'&page='.$pager->getPreviousPage()) ?>
  <?php
  $links = $pager->getLinks();
  foreach ($links as $page):
  ?>
    <?php
    echo ($page == $pager->getPage()) ? $page : 
    	link_to($page, $this->url.'&page='.$page)
    ?>
    <?php if ($page != $pager->getCurrentMaxLink()): ?> - <?php endif ?>
  <?php
  endforeach
  ?>
  <?php echo link_to('&gt;', $this->url.'&page='.$pager->getNextPage()) ?>
  <?php echo link_to('&raquo;', $this->url.'&page='.$pager->getLastPage()) ?>
<?php endif ?>
