<?php
namespace fayexam\models\tables;

use fay\core\db\Table;
use fay\core\Loader;

class ExamExamsQuestionsTable extends Table{
    protected $_name = 'exam_exams_questions';
    
    /**
     * @return $this
     */
    public static function model(){
        return Loader::singleton(__CLASS__);
    }
    
    public function rules(){
        return array(
            array(array('id'), 'int', array('min'=>0, 'max'=>4294967295)),
            array(array('exam_id', 'question_id'), 'int', array('min'=>0, 'max'=>16777215)),
            array(array('total_score', 'score'), 'float', array('length'=>5, 'decimal'=>2)),
        );
    }

    public function labels(){
        return array(
            'id'=>'Id',
            'exam_id'=>'Exam Id',
            'question_id'=>'Question Id',
            'total_score'=>'Total Score',
            'score'=>'Score',
        );
    }

    public function filters(){
        return array(
            'exam_id'=>'intval',
            'question_id'=>'intval',
            'total_score'=>'floatval',
            'score'=>'floatval',
        );
    }
}