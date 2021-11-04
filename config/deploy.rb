# config valid only for current version of Capistrano
lock '3.8.0'

set :application, 'ammba'
set :repo_url, 'https://health-robot:drMG284um9ycSMER@git.substrakt.com/client-work/ammba-new.git'
set :deploy_to, '/var/www/html'
set :scm, :git
set :keep_releases, 5

# Default value for :format is :airbrussh.
# set :format, :airbrussh

# You can configure the Airbrussh format using :format_options.
# These are the defaults.
# set :format_options, command_output: true, log_file: 'log/capistrano.log', color: :auto, truncate: :auto

# Default value for :pty is false
# set :pty, true

# Default value for :linked_files is []
# append :linked_files, 'config/database.yml', 'config/secrets.yml'

# Default value for linked_dirs is []
append :linked_dirs, 'wp-content/uploads'

# Default value for default_env is {}
# set :default_env, { path: "/opt/ruby/bin:$PATH" }
