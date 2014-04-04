<?php

class QueueCommand extends CConsoleCommand
{

    public function run($args)
    {
        echo "*********************\n ".date('Y-m-d H:i:s')."\n*********************\n";
        $c = new CDbCriteria();
        $c->order = 'create_time ASC';
        /** @var Queue $queue */
        $queue = Queue::model()->find($c);

        if(!$queue) {
            echo "The queue is empty\n*********************\n";
            return;
        }

        switch($queue->type) {
            case Queue::TYPE_MAIL:
                $this->handleMail($queue);
                break;
        }

        $queue->delete();

        echo "*********************\n";
    }

    private function handleMail(Queue $queue)
    {
        echo "==========\n[MAIL]\n==========\n";

        // Code here...
    }
} 