        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
              <div class="navbar-header">
                <a class="navbar-brand" href="#">
                    <img alt="Brand" src="<?php echo $assets_url;?>images/town.png"/>
                </a>
              </div>
                
                <form action="<?php echo base_url();?>home/login_process" method="post" class="navbar-form navbar-right">
                    <div class="form-group">
                        <input name="email" type="text" class="form-control" placeholder="Email">
                        <input name="password" type="password" class="form-control" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
                <p class="navbar-text navbar-right"><a href="<?php echo base_url();?>home/forgot_password" class="navbar-link">Lupa Password?</a></p>
            </div>
        </nav>