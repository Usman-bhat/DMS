<style>
    @font-face {
    font-family: jameelnoori;
    src: url('../fonts/Jameel Noori Nastaleeq Kasheeda.ttf');
    }
    .ur_text{
        font-family: 'jameelnoori';
        font-size: larger;
        /* font-family: 'Courier New', Courier, monospace; */
    }

</style>
<!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
   <!-- Left navbar links -->
   <ul class="navbar-nav">
     <li class="nav-item">
       <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
     </li>
     <li class="nav-item d-none d-sm-inline-block">
       <a href="index.php" class="nav-link"><?= __('Home')?></a>
     </li>
     <li class="nav-item d-none d-sm-inline-block">
       <a href="../" class="nav-link"><?= __('Main Site')?></a>
     </li>
   </ul>

   <!-- Right navbar links -->
   <ul class="navbar-nav ml-auto">
     <!-- Navbar Search -->
     <li class="nav-item">
       <a class="nav-link" data-widget="navbar-search" href="#" role="button">
         <i class="fas fa-search"></i>
       </a>
       <div class="navbar-search-block">
         <form class="form-inline">
           <div class="input-group input-group-sm">
             <input class="form-control form-control-navbar" type="search" placeholder="<?= __('Search')?>" aria-label="<?= __('Search')?>">
             <div class="input-group-append">
               <button class="btn btn-navbar" type="submit">
                 <i class="fas fa-search"></i>
               </button>
               <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                 <i class="fas fa-times"></i>
               </button>
             </div>
           </div>
         </form>
       </div>
     </li>

<li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
          <i class="fas fa-language"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
        <span class="dropdown-item dropdown-header ur_text"><?= __('Languages')?></span>

          <a href="index.php?lang=en" class="dropdown-item">
            <i class="fas fa-globe mr-2"></i> ENGLISH
          </a>
          <div class="dropdown-divider"></div>
          <a href="index.php?lang=ur" class="dropdown-item  ur_text">
            <i class="fas fa-globe mr-2"></i> اردو
          </a>
          </div>
      </li>


     
      
   </ul>
 </nav>
 <!-- /.navbar -->