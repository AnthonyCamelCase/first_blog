<header>
<h1>Blog de malade</h1>       
</header>

<nav id="menu">        
    <div class="element_menu">
        <ul>  
            <?php if (isset($_SESSION["user"]))
                {?> 
                    <li><a href="blog.php">accès au blog</a></li>
                    <li><a href="member.php">accès à la page membre</a></li>
                    <li><a href="newArticle.php">écrire un nouvel article</a></li>
                    <li><a href="deconnexion.php">déconnexion</a></li>
            <?php 
                }
                else
                {?>
                    <li><a href="connexion.php">connexion</a></li>
                    <li><a href="inscription.php">inscription</a></li>
            <?php
                }
            ?>
        
        </ul>
    </div>    
</nav>