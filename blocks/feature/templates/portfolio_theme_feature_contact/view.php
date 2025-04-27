<?php use Concrete\Core\Html\Service\FontAwesomeIcon;

defined('C5_EXECUTE') or die("Access Denied.");

/** @var string|null $title */
/** @var string|null $titleFormat */
/** @var string|null $paragraph */
/** @var FontAwesomeIcon|null $iconTag */

$iconTagEl = $iconTag->getTag();
$iconTagEl->addClass("theme-bg icon");
echo $iconTagEl->render();

if ($title) {
    echo sprintf("<label>%s</label>", $title);
}

if ($paragraph) {
    echo $paragraph;
}