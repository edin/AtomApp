<?php

/** 
 *  @var Atom\Collections\PagedCollection $collection
 *  @var string $url
 */

$totalPages = $collection->getTotalPages();
$totalCount = $collection->getTotalCount();
$currentPage = $collection->getCurrentPage();
$start = max(1, $currentPage - 3);
$end = min($totalPages, $start + 5);

?>
<?php if ($collection->getTotalPages() > 1) : ?>
    <nav>
        <ul class="pagination">
            <?php if ($collection->hasPrevious()) : ?>
                <?php $pageUrl = strtr($url, ["{page}" => $currentPage - 1]) ?>
                <li class="page-item"><a class="page-link" href="<?= $pageUrl ?>">Previous</a></li>
            <?php endif; ?>

            <?php for ($page = $start; $page <= $end; $page++) : ?>
                <?php $pageUrl = strtr($url, ["{page}" => $page]) ?>
                <li class="page-item"><a class="page-link" href="<?= $pageUrl ?>"><?= $page ?></a></li>
            <?php endfor; ?>

            <?php if ($collection->hasNext()) : ?>
                <?php $pageUrl = strtr($url, ["{page}" => $page]) ?>
                <li class="page-item"><a class="page-link" href="<?= $pageUrl ?>">Next</a></li>
            <?php endif; ?>
        </ul>
    </nav>
<?php endif; ?>