server '46.101.2.85', user: 'root'

 set :ssh_options, {
   keys: %w(~/.ssh/sampad-dev),
   forward_agent: false,
 }
