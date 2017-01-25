<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "EC_NEW_ACAD".
 *
 * @property double $ACAD_ID
 * @property double $LEVEL_ID
 * @property double $AREA_SPECIALIZATION_ID
 * @property string $KULY
 * @property string $NAME_PROG_ENG
 * @property string $NAME_PROG_MAL
 * @property double $EXPECTED_YEAR_OFFERED
 * @property double $IPTA_ID
 * @property double $HR_IMPLICATION_ID
 * @property double $PR_IMPLICATION_ID
 * @property double $FIN_IMPLICATION_ID
 * @property string $ACAD_STATUS
 * @property double $SUB_AREA_SPECIALIZATION_ID
 * @property double $STATUS_ID
 * @property string $INSERT_BY
 * @property string $DATE_INSERT
 * @property double $INDICATOR_LEVELID
 * @property double $INDICATOR_AREA_SPECIALIZATION
 * @property double $INDICATOR_KULY
 * @property double $INDICATOR_NAME_PROG_ENG
 * @property double $INDICATOR_NAME_PROG_MAL
 * @property double $INDICATOR_EXPECTED_YEAR
 * @property double $INDICATOR_JUSTIFICATION
 * @property double $INDICATOR_IPTA
 * @property double $INDICATOR_HR_IMPLICATION
 * @property double $INDICATOR_PR_IMPLICATION
 * @property double $INDICATOR_FIN_IMPLICATION
 * @property double $INDICATOR_OVERLAPPING
 * @property double $INDICATOR_OBJECTIVE
 * @property string $EC_OVERLAPPING_DESC
 * @property double $PARENT_ID
 * @property string $WHO_CAN_EDIT
 * @property double $GROUP_ID
 * @property integer $DEPT_CODE
 * @property string $MQA_APPROVE_DATE
 * @property string $SENATE_APPROVE_DATE
 * @property string $JPT_APPROVE_DATE
 * @property string $MAJLIS_APPROVE_DATE
 * @property string $PROFESSIONAL_BODY_APPROVE_DATE
 * @property string $MQR_NUMBER
 * @property string $IS_NEW_PROG
 * @property string $JUSTIFICATION
 * @property string $JUSTIFICATIONS
 */
class NewAcad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'EC_NEW_ACAD';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LEVEL_ID', 'AREA_SPECIALIZATION_ID', 'EXPECTED_YEAR_OFFERED', 'IPTA_ID', 'HR_IMPLICATION_ID', 'PR_IMPLICATION_ID', 'FIN_IMPLICATION_ID', 'SUB_AREA_SPECIALIZATION_ID', 'STATUS_ID', 'INDICATOR_LEVELID', 'INDICATOR_AREA_SPECIALIZATION', 'INDICATOR_KULY', 'INDICATOR_NAME_PROG_ENG', 'INDICATOR_NAME_PROG_MAL', 'INDICATOR_EXPECTED_YEAR', 'INDICATOR_JUSTIFICATION', 'INDICATOR_IPTA', 'INDICATOR_HR_IMPLICATION', 'INDICATOR_PR_IMPLICATION', 'INDICATOR_FIN_IMPLICATION', 'INDICATOR_OVERLAPPING', 'INDICATOR_OBJECTIVE', 'PARENT_ID', 'GROUP_ID'], 'number'],
            [['DATE_INSERT', 'MQA_APPROVE_DATE', 'SENATE_APPROVE_DATE', 'JPT_APPROVE_DATE', 'MAJLIS_APPROVE_DATE', 'PROFESSIONAL_BODY_APPROVE_DATE'], 'string'],
            [['DEPT_CODE'], 'integer'],
            [['KULY'], 'string', 'max' => 100],
            [['NAME_PROG_ENG', 'NAME_PROG_MAL'], 'string', 'max' => 2000],
            [['ACAD_STATUS'], 'string', 'max' => 10],
            [['INSERT_BY', 'MQR_NUMBER'], 'string', 'max' => 200],
            [['EC_OVERLAPPING_DESC', 'WHO_CAN_EDIT', 'JUSTIFICATION', 'JUSTIFICATIONS'], 'string', 'max' => 4000],
            [['IS_NEW_PROG'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ACAD_ID' => 'Acad  ID',
            'LEVEL_ID' => 'Level  ID',
            'AREA_SPECIALIZATION_ID' => 'Area  Specialization  ID',
            'KULY' => 'Kuly',
            'NAME_PROG_ENG' => 'Name  Prog  Eng',
            'NAME_PROG_MAL' => 'Name  Prog  Mal',
            'EXPECTED_YEAR_OFFERED' => 'Expected  Year  Offered',
            'IPTA_ID' => 'Ipta  ID',
            'HR_IMPLICATION_ID' => 'Hr  Implication  ID',
            'PR_IMPLICATION_ID' => 'Pr  Implication  ID',
            'FIN_IMPLICATION_ID' => 'Fin  Implication  ID',
            'ACAD_STATUS' => 'Acad  Status',
            'SUB_AREA_SPECIALIZATION_ID' => 'Sub  Area  Specialization  ID',
            'STATUS_ID' => 'Status  ID',
            'INSERT_BY' => 'Insert  By',
            'DATE_INSERT' => 'Date  Insert',
            'INDICATOR_LEVELID' => 'Indicator  Levelid',
            'INDICATOR_AREA_SPECIALIZATION' => 'Indicator  Area  Specialization',
            'INDICATOR_KULY' => 'Indicator  Kuly',
            'INDICATOR_NAME_PROG_ENG' => 'Indicator  Name  Prog  Eng',
            'INDICATOR_NAME_PROG_MAL' => 'Indicator  Name  Prog  Mal',
            'INDICATOR_EXPECTED_YEAR' => 'Indicator  Expected  Year',
            'INDICATOR_JUSTIFICATION' => 'Indicator  Justification',
            'INDICATOR_IPTA' => 'Indicator  Ipta',
            'INDICATOR_HR_IMPLICATION' => 'Indicator  Hr  Implication',
            'INDICATOR_PR_IMPLICATION' => 'Indicator  Pr  Implication',
            'INDICATOR_FIN_IMPLICATION' => 'Indicator  Fin  Implication',
            'INDICATOR_OVERLAPPING' => 'Indicator  Overlapping',
            'INDICATOR_OBJECTIVE' => 'Indicator  Objective',
            'EC_OVERLAPPING_DESC' => 'Ec  Overlapping  Desc',
            'PARENT_ID' => 'Parent  ID',
            'WHO_CAN_EDIT' => 'Who  Can  Edit',
            'GROUP_ID' => 'Group  ID',
            'DEPT_CODE' => 'Dept  Code',
            'MQA_APPROVE_DATE' => 'Mqa  Approve  Date',
            'SENATE_APPROVE_DATE' => 'Senate  Approve  Date',
            'JPT_APPROVE_DATE' => 'Jpt  Approve  Date',
            'MAJLIS_APPROVE_DATE' => 'Majlis  Approve  Date',
            'PROFESSIONAL_BODY_APPROVE_DATE' => 'Professional  Body  Approve  Date',
            'MQR_NUMBER' => 'Mqr  Number',
            'IS_NEW_PROG' => 'Is  New  Prog',
            'JUSTIFICATION' => 'Justification',
            'JUSTIFICATIONS' => 'Justifications',
        ];
    }
}
