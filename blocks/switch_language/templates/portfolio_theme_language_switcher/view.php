<?php

use Concrete\Core\Multilingual\Service\Detector;
use Concrete\Core\Page\Page;
use Concrete\Core\Permission\Checker;

defined('C5_EXECUTE') or die('Access Denied.');

/* @var Concrete\Core\Form\Service\Form $form */
/* @var Concrete\Core\Block\View\BlockView $view */

// The text label as configured by the user
/* @var string $label */

// Array keys are the multilingual section IDs, array values are the language names (in their own language)
/* @var array $languages */

// The list of multilanguage language sections
/* @var Concrete\Core\Multilingual\Page\Section\Section[] $languageSections */

// The ID of the currently active multilingual section (if available)
/* @var int|null $activeLanguage */

// The default multilingual section
/* @var Concrete\Core\Multilingual\Page\Section\Section $defaultLocale */

// The current language code (without Country code)
/* @var string $locale */

// The ID of the current page
/* @var int $cID */

/** @var \Concrete\Core\Multilingual\Service\Detector $detector */

$app = \Concrete\Core\Support\Facade\Application::getFacadeApplication();
/** @var Detector $dl */
$dl = $app->make('multilingual/detector');
$ml = $dl->getAvailableSections();
$c = Page::getCurrentPage();
$languages = [];
$mlAccessible = [];
foreach ($ml as $m) {
    $pc = new Checker(Page::getByID($m->getCollectionID()));
    if ($pc->canRead()) {
        $mlAccessible[] = $m;
        $languages[$m->getCollectionID()] = strtoupper(substr($m->getLocale(), 0, 2));
    }
}
?>

<ul>
    <?php foreach ($languages as $targetSectionID => $language) { ?>
        <li>
            <a href="<?php echo h($detector->getSwitchLink($cID, $targetSectionID)) ?>">
                <?php echo $language; ?>
            </a>
        </li>
    <?php } ?>
</ul>