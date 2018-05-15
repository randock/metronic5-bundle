<?php

declare(strict_types=1);

namespace Randock\Metronic5Bundle\HeaderBuilder\HeaderList\NotificationHeaderListItem;

class NotificationHeaderListItem
{
    public const SUCCESS = 'success';
    public const WARNING = 'warning';
    public const DANGER = 'danger';
    public const INFO = 'info';
    public const BRAND = 'brand';
    public const METAL = 'metal';
    public const LIGHT = 'light';
    public const ACCENT = 'accent';
    public const FOCUS = 'focus';
    public const PRIMARY = 'primary';

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $url;

    /**
     * @var array
     */
    public $linkAfterTitle;

    /**
     * @var array
     */
    public $badge;

    /**
     * @var string
     */
    public $rightText;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return NotificationHeaderListItem
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     *
     * @return NotificationHeaderListItem
     */
    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return array
     */
    public function getLinkAfterTitle(): array
    {
        return $this->linkAfterTitle;
    }

    /**
     * @param array $linkAfterTitle
     *
     * @return NotificationHeaderListItem
     */
    public function setLinkAfterTitle(array $linkAfterTitle): self
    {
        $this->linkAfterTitle = $linkAfterTitle;

        return $this;
    }

    /**
     * @return array
     */
    public function getBadge(): array
    {
        return $this->badge;
    }

    /**
     * @param array $badge
     *
     * @return NotificationHeaderListItem
     */
    public function setBadge(array $badge): self
    {
        $this->badge = $badge;

        return $this;
    }

    /**
     * @return string
     */
    public function getRightText(): string
    {
        return $this->rightText;
    }

    /**
     * @param string $rightText
     *
     * @return NotificationHeaderListItem
     */
    public function setRightText(string $rightText): self
    {
        $this->rightText = $rightText;

        return $this;
    }
}
