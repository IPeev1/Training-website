<?php
/**
 * edit by sanjay 5-4-2017
 * Created by ESL
 * Date: 3-4-2017
 * Time: 16:17
 */
namespace codeproduction\models\db;
use \php\models\db\Entiteit as Entiteit;

class Lesson extends Entiteit {
    protected $id;
    protected $time;
    protected $date;
    protected $location;
    protected $max_persons;
    protected $training_id;
    protected $instructor_id;

    /*enkel voor binnen de sql*/
    protected $description;
    protected $duration;
    protected $extra_costs;
    protected $aanmeldingen;
    protected $member_id;
}
