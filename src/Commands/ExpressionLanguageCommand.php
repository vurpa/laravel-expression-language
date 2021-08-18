<?php

namespace Vurpa\ExpressionLanguage\Commands;

use Illuminate\Console\Command;

class ExpressionLanguageCommand extends Command
{
    public $signature = 'laravel-expression-language';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
