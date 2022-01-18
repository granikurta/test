<?php


namespace core\Library;


class Paginate
{

    private int $itemsPerPage = 3;
    private int $pages;
    private int $offset;
    private int $currentPage;

    public function __construct($page, $totalPage)
    {
        $this->currentPage = $page;
        $this->offset = $this->itemsPerPage * ($page - 1);
        $this->pages = ceil($totalPage / $this->itemsPerPage);
    }

    /**
     * @return int
     */
    public function getItemsPerPage(): int
    {
        return $this->itemsPerPage;
    }

    /**
     * @return float|int
     */
    public function getOffset(): float|int
    {
        return $this->offset;
    }

    /**
     * @return float
     */
    public function getPages(): float
    {
        return $this->pages;
    }

    public function buildPaginator($entity)
    {
        return new Paginator($this->currentPage, $this->pages, $entity);
    }
}