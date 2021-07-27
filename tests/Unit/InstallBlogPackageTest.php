<?php

namespace JohnDoe\BlogPackage\Tests\Unit;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use JohnDoe\BlogPackage\Console\InstallBlogPackage;
use JohnDoe\BlogPackage\Tests\TestCase;

class InstallBlogPackageTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        
        $this->cleanUp();
    }
    
    public function tearDown(): void
    {
        parent::tearDown();
        
        $this->cleanUp();
    }

    /** @test */
    public function the_install_command_copies_a_the_configuration()
    {
        $this->assertFalse(File::exists(config_path('blogpackage.php')));

        Artisan::call('blogpackage:install');

        $this->assertTrue(File::exists(config_path('blogpackage.php')));
    }
    
    /** @test */
    public function when_a_config_file_is_present_users_can_choose_to_not_overwrite_it()
    {
        // Given we have already have an existing config file
        File::put(config_path('blogpackage.php'), 'test contents');
        $this->assertTrue(File::exists(config_path('blogpackage.php')));
        
        // When we run the install command
        $command = $this->artisan('blogpackage:install');
 
        // We expect a warning that our configuration file exists
        $command->expectsConfirmation(
            'Config file already exists. Do you want to overwrite it?',
            // When answered with "no"
            'no'
        );
        
        // We should see a message that our file was not overwritten
        $command->expectsOutput('Existing configuration was not overwritten');

        // Assert that the original contents of the config file remain
        $this->assertEquals('test contents', file_get_contents(config_path('blogpackage.php')));
    }

    /** @test */
    public function when_a_config_file_is_present_users_can_choose_to_do_overwrite_it()
    {
        // Given we have already have an existing config file
        File::put(config_path('blogpackage.php'), 'test contents');
        $this->assertTrue(File::exists(config_path('blogpackage.php')));

        // When we run the install command
        $command = $this->artisan('blogpackage:install');
        
        // We expect a warning that our configuration file exists
        $command->expectsConfirmation(
            'Config file already exists. Do you want to overwrite it?',
            // When answered with "yes"
            'yes'
        );
        
        $command->execute();

        $command->expectsOutput('Overwriting configuration file...');
        
        // Assert that the original contents are overwritten
        $this->assertEquals(
            file_get_contents(__DIR__.'/../../config/config.php'),
            file_get_contents(config_path('blogpackage.php'))
        );
    }

    private function cleanUp()
    {
       if (File::exists(config_path('blogpackage.php'))) {
            unlink(config_path('blogpackage.php'));
       } 
    }
}
