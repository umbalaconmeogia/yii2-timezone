<?php
namespace umbalaconmeogia\simpledatasystem\migrations;

use batsg\migrations\BaseMigration;

/**
 * Initializes simple data system tables.
 *
 * @author Tran Trung Thanh <umbalaconmeogia@gmail.com>
 */
class m240219_193700_worldclock_init extends BaseMigration
{
    private $tableSchedule = 'wc_schedule';

    private $tableScheduleOption = 'wc_schedule_option';

    private $tablePeople = 'wc_people';

    private $tablePeopleTimezone = 'wc_people_timezone';

    private $tableSOPT = 'wc_people_timezone';

    /**
     * {@inheritdoc}
     */
    protected function safeUp()
    {
        $this->createTableWithExtraFields($this->tableSchedule, [
            'uuid' => $this->string()->notNull(),
            'name' => $this->string()->notNull(),
            'description' => $this->text(),
        ]);
        $this->createIndexes($this->tableSchedule, 'uuid');

        $this->createTableWithExtraFields($this->tableScheduleOption, [
            'schedule_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'datetime' => $this->string()->notNull(),
            'timezone' => $this->string()->notNull(),
            'description' => $this->text(),
        ]);
        $this->addForeignKeys($this->tableScheduleOption, $this->tableSchedule, 'schedule_id');

        $this->createTableWithExtraFields($this->tablePeople, [
            'name' => $this->string()->notNull(),
            'description' => $this->text(),
        ]);

        $this->createTableWithExtraFields($this->tablePeopleTimezone, [
            'people_id' => $this->integer(),
            'timezone' => $this->string()->notNull(),
            'name' => $this->string(),
        ]);
        $this->addForeignKeys($this->tablePeopleTimezone, $this->tablePeople, 'people_id');

        $this->createTableWithExtraFields($this->tableSOPT, [
            'schedule_option_id' => $this->integer()->notNull(),
            'people_timezone_id' => $this->integer()->notNull(),
        ]);
        $this->addForeignKeys($this->tableSOPT, $this->tableScheduleOption, 'schedule_option_id');
        $this->addForeignKeys($this->tableSOPT, $this->tablePeopleTimezone, 'people_timezone_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tableSOPT);
        $this->dropTable($this->tablePeopleTimezone);
        $this->dropTable($this->tablePeople);
        $this->dropTable($this->tableScheduleOption);
        $this->dropTable($this->tableSchedule);
    }
}
