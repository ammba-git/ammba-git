server '188.166.89.185', user: 'root'

 set :ssh_options, {
   keys: %w(~/.ssh/ammba-production),
   forward_agent: false,
 }
