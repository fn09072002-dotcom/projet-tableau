<?php

require 'model/product.model.php';
require 'model/client.model.php';
require 'model/commande.model.php';

require 'view/product.view.php';


require 'utils/validator.php';
require 'utils/view.utils.php';
require 'utils/error.php';


require 'service/service.php';


require 'controller/product.controller.php';
require 'controller/client.controller.php';


saveProduct();
archiverProduit();
