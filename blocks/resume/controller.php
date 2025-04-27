<?php /** @noinspection PhpDeprecationInspection */
/** @noinspection SqlNoDataSourceInspection */

/** @noinspection SqlDialectInspection */

namespace Concrete\Package\PortfolioTheme\Block\Resume;

use Concrete\Core\Block\BlockController;
use Concrete\Core\Database\Connection\Connection;
use Concrete\Core\Error\ErrorList\ErrorList;

class Controller extends BlockController
{
    protected $btTable = 'btResume';
    protected $btInterfaceWidth = 400;
    protected $btInterfaceHeight = 500;
    protected $btCacheBlockOutputLifetime = 300;

    public function getBlockTypeDescription(): string
    {
        return t('Add a resume to your site.');
    }

    public function getBlockTypeName(): string
    {
        return t("Resume");
    }

    public function view()
    {
        /** @var Connection $db */
        /** @noinspection PhpUnhandledExceptionInspection */
        $db = $this->app->make(Connection::class);
        $this->set("items", $db->fetchAll("SELECT * FROM btResumeItem WHERE bID = ?", [$this->bID]));
    }

    public function add()
    {
        $this->set("items", []);
    }

    public function edit()
    {
        /** @var Connection $db */
        /** @noinspection PhpUnhandledExceptionInspection */
        $db = $this->app->make(Connection::class);
        /** @noinspection PhpUnhandledExceptionInspection */
        $this->set("items", $db->fetchAll("SELECT * FROM btResumeItem WHERE bID = ?", [$this->bID]));
    }

    public function delete()
    {
        /** @var Connection $db */
        /** @noinspection PhpUnhandledExceptionInspection */
        $db = $this->app->make(Connection::class);
        /** @noinspection PhpUnhandledExceptionInspection */
        $db->executeQuery("DELETE FROM btResumeItem WHERE bID = ?", [$this->bID]);

        parent::delete();
    }

    public function save($args)
    {
        parent::save($args);

        /** @var Connection $db */
        /** @noinspection PhpUnhandledExceptionInspection */
        $db = $this->app->make(Connection::class);
        /** @noinspection PhpUnhandledExceptionInspection */
        $db->executeQuery("DELETE FROM btResumeItem WHERE bID = ?", [$this->bID]);

        if (isset($args["items"]) && is_array($args["items"])) {
            foreach ($args["items"] as $item) {
                /** @noinspection PhpUnhandledExceptionInspection */
                $db->executeQuery("INSERT INTO btResumeItem (bID, yearFrom, yearTo, company, description) VALUES (?, ?, ?, ?, ?)", [
                    $this->bID,
                    isset($item["yearFrom"]) && !empty($item["yearFrom"]) ? $item["yearFrom"] : null,
                    isset($item["yearTo"]) && !empty($item["yearTo"]) ? $item["yearTo"] : null,
                    isset($item["company"]) && !empty($item["company"]) ? $item["company"] : null,
                    isset($item["description"]) && !empty($item["description"]) ? $item["description"] : null,
                ]);
            }
        }
    }

    public function validate($args)
    {
        $e = new ErrorList();

        if (isset($args["items"])) {
            foreach($args["items"] as $item) {
                if (empty($item["yearFrom"])) {
                    $e->addError("You need to enter a valid year.");
                }

                if (empty($item["yearTo"])) {
                    $e->addError("You need to enter a valid year.");
                }

                if (empty($item["company"])) {
                    $e->addError("You need to enter a valid company name.");
                }

                if (empty($item["description"])) {
                    $e->addError("You need to enter a valid description.");
                }
            }
        } else {
            $e->addError("You need to add at least one item.");
        }

        return $e;
    }

    public function duplicate($newBID)
    {
        parent::duplicate($newBID);

        /** @var Connection $db */
        /** @noinspection PhpUnhandledExceptionInspection */
        $db = $this->app->make(Connection::class);

        $copyFields = 'yearFrom, yearTo, company, description';

        /** @noinspection PhpUnhandledExceptionInspection */
        $db->executeUpdate("INSERT INTO btResumeItem (bID, $copyFields) SELECT ?, $copyFields FROM btResumeItem WHERE bID = ?", [
                $newBID,
                $this->bID
            ]
        );
    }

}