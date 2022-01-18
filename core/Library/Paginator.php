<?php


namespace core\Library;


class Paginator
{
    private int $currentPage;
    private int $totalPage;
    private $entity;
    private array $urlPages;

    public function __construct($currentPage, $totalPage, $entity)
    {
        $this->currentPage = $currentPage;
        $this->totalPage = $totalPage;
        $this->entity = $entity;
        $this->urlPages = $this->buildUrlPages();
    }

    /**
     * @return array
     */
    private function buildUrlPages()
    {
        $urlList = [];
        for ($p = 1; $p <= $this->currentPage; $p++) {
            $urlList[$p] = $this->getUrl($p);
        }
        for ($i = $this->currentPage; $i <= ($this->totalPage); $i++) {
            $urlList[$i] = $this->getUrl($i);
        }

        return $urlList;
    }


    private function getUrl($current)
    {
        return '/page/' . $current . $this->getQueryParams();
    }

    private function getQueryParams()
    {
        return '?' . parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
    }

    /**
     * @return int
     */
    public function getCurrentPage(): int
    {
        return $this->currentPage;
    }

    /**
     * @return mixed
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * @return array
     */
    public function getUrlPages()
    {
        return $this->urlPages;
    }
}