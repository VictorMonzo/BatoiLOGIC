/**
    users
 */
INSERT INTO `users` (`id`, `name`, `surname`, `email`, `email_verified_at`, `address`, `password`, `type_user`, `remember_token`, `created_at`, `updated_at`, `photo`) VALUES (NULL, 'Víctor', 'Monzó Mora', 'victor.monzo.mora@gmail.com', NULL, 'C/ Correos Nº6 7ºB', '$2y$10$KFq4zwDuTMzV6BLwaX3e5.eCZ//ZLUhL83QYdLtg1bCXVVgF4CpQW', '3', '9d13f462f235783537ee3e328d878080574f996fba97bb3965eced1e221566a1', '2021-01-17 19:02:37', '2021-01-17 19:02:37', '/imgs/products-users/DB/DB-userVictor.png');
INSERT INTO `users` (`id`, `name`, `surname`, `email`, `email_verified_at`, `address`, `password`, `type_user`, `remember_token`, `created_at`, `updated_at`, `photo`) VALUES (NULL, 'Adam', 'Paredes', 'adamparedes06@gmail.com', NULL, 'C/ Alcoy', '$2y$10$KFq4zwDuTMzV6BLwaX3e5.eCZ//ZLUhL83QYdLtg1bCXVVgF4CpQW', '3', 'dbf7ea5aba7db94e155256f10d0a51fac093808e6b1cec25db2d9c2b1a9a0713', '2021-01-17 19:02:47', '2021-01-17 19:02:47', '/imgs/products-users/DB/DB-userAdam.png');
INSERT INTO `users` (`id`, `name`, `surname`, `email`, `email_verified_at`, `address`, `password`, `type_user`, `remember_token`, `created_at`, `updated_at`, `photo`) VALUES (NULL, 'José', 'Juan', 'josejuan@alcoyano.com', NULL, 'C/ Perú, 18 1A', '$2y$10$KFq4zwDuTMzV6BLwaX3e5.eCZ//ZLUhL83QYdLtg1bCXVVgF4CpQW', '1', 'dbf7ea5aba7db94e155256f10d0a51fac093808e6b1cec25db2d9c2b1a9a0714', '2021-01-17 19:02:48', '2021-01-17 19:02:48', '/imgs/products-users/DB/DB-userJoseJuan.png');
INSERT INTO `users` (`id`, `name`, `surname`, `email`, `email_verified_at`, `address`, `password`, `type_user`, `remember_token`, `created_at`, `updated_at`, `photo`) VALUES (NULL, 'Sneak', 'Shoes Company', 'info@sneak.com', NULL, 'Av. Hispanidad, Nº14 (bajo)', '$2y$10$KFq4zwDuTMzV6BLwaX3e5.eCZ//ZLUhL83QYdLtg1bCXVVgF4CpQW', '2', 'dbf7ea5aba7db94e155256f10d0a51fac093808e6b1cec25db2d9c2b1a9a0715', '2021-01-17 19:02:49', '2021-01-17 19:02:49', '/imgs/products-users/DB/DB-userDealer1.png');

/**
    states
 */
INSERT INTO `states` (`id`, `name`) VALUES (NULL, 'Esperando');
INSERT INTO `states` (`id`, `name`) VALUES (NULL, 'En ruta');
INSERT INTO `states` (`id`, `name`) VALUES (NULL, 'Finalizado');
INSERT INTO `states` (`id`, `name`) VALUES (NULL, 'Fuera de servicio');

/**
    type_users
 */
INSERT INTO `type_users` (`id`, `name`) VALUES (NULL, 'Customer');
INSERT INTO `type_users` (`id`, `name`) VALUES (NULL, 'Dealer');
INSERT INTO `type_users` (`id`, `name`) VALUES (NULL, 'Administrador');

/**
    providers
 */
INSERT INTO `providers` (`id`, `name`, `email`, `created_at`, `updated_at`) VALUES (NULL, 'Nike', 'info@nike.com', '2021-01-17 19:05:19', '2021-01-17 19:05:19');
INSERT INTO `providers` (`id`, `name`, `email`, `created_at`, `updated_at`) VALUES (NULL, 'Adidas', 'info@adidas.com', '2021-01-17 19:05:20', '2021-01-17 19:05:20');
INSERT INTO `providers` (`id`, `name`, `email`, `created_at`, `updated_at`) VALUES (NULL, 'Puma', 'info@puma.com', '2021-01-17 19:12:04', '2021-01-17 19:12:04');

/**
    products
 */
INSERT INTO `products` (`id`, `name`, `description`, `price`, `stock`, `active`, `photo`, `created_at`, `updated_at`, `provider_id`) VALUES (NULL, 'Nike Air Force 1', 'Las clásicas Air Force 1, ahora con un toque diferente. Estas zapatillas AF1 ’07 de Nike para hombre son de color blanco con el Swoosh en negro. Están hechas principalmente de piel, aunque también tiene partes sintéticas. Las pequeñas perforaciones de la puntera ayudan a transpirar mejor el interior. En la entresuela gruesa de las Nike Air Force 1 07 LV8 se esconde una cámara de aire que amortigua los pasos como nunca, mientras que su suela antideslizante de goma ofrece una tracción inmejorable.', '110,00', '200', '1', '/imgs/products-users/DB/DB-prodNike1.jpg', '2021-01-17 19:20:26', '2021-01-17 19:20:26', '1');
INSERT INTO `products` (`id`, `name`, `description`, `price`, `stock`, `active`, `photo`, `created_at`, `updated_at`, `provider_id`) VALUES (NULL, 'Nike Air Max 720', '¡El futuro de las sneakers! Sorprende a todo el mundo caminando por la ciudad con estas Nike Air Max 720 para hombre. Tienen un aspecto muy versátil ya que es la versión totalmente negra. Estas zapatillas futuristas también destacan por su diseño de empeine de tejido transpirable y una sueña compuesta por una cámara de aire completa. Es la más alta hasta la fecha y ofrece una amortiguación de 360 grados. Deja a todos alucinados con tus Nike Air Max 720 Triple Black.', '125,00', '130', '1', '/imgs/products-users/DB/DB-prodNike2.jpg', '2021-01-17 19:20:26', '2021-01-17 19:20:26', '1');
INSERT INTO `products` (`id`, `name`, `description`, `price`, `stock`, `active`, `photo`, `created_at`, `updated_at`, `provider_id`) VALUES (NULL, 'Adidas Originals Ozweego', '¡Lanzamiento exclusivo a la vista! Llegan las Oweego actualizadas y modernizadas a JD, un clásico ‘retro running’ de adidas Originals más que renovado. En una gama de colores ‘triple black’ para un ‘look’ premium, estas zapas traen un empeine de malla transpirable junto con combinaciones de gamuza y de TPU para asegurar una mayor durabilidad. ', '120,00', '100', '1', '/imgs/products-users/DB/DB-prodAdidas1.jpg', '2021-01-17 19:33:22', '2021-01-17 19:33:22', '2');
INSERT INTO `products` (`id`, `name`, `description`, `price`, `stock`, `active`, `photo`, `created_at`, `updated_at`, `provider_id`) VALUES (NULL, 'Adidas Originals ZX 2K Boost', 'Inspiradas en las misiones espaciales, estas zapatillas de deporte ZX 2K Boost para hombre de adidas rinden homenaje a la carrera espacial. En una combinación de colores beige, plateado y rojo, estas zapatillas están confeccionadas con una parte superior de tela cerrada mientras que el TPU brinda soporte adicional. La entresuela Boost contrastante mantiene cada aterrizaje suave mientras que la suela de goma brinda tracción de siguiente nivel. Impulsados por el legado de ZX e inspirados en la misión espacial Artemis, estos creps están terminados con 3 bandas en las paredes laterales.', '140,00', '80', '1', '/imgs/products-users/DB/DB-prodAdidas2.jpg', '2021-01-17 19:33:22', '2021-01-17 19:33:22', '2');
INSERT INTO `products` (`id`, `name`, `description`, `price`, `stock`, `active`, `photo`, `created_at`, `updated_at`, `provider_id`) VALUES (NULL, 'Nike Air Max 270', 'Inspo de las Air 180 y Air Max 93, estas zapatillas Air Max 270 para hombre aportan una comodidad superior a tus zapatillas deportivas. En una combinación de colores negro, azul y blanco, están confeccionados con una parte superior de punto estilo botín y cuentan con un cierre de cordones seguro y una lengüeta en el talón. Sentados en 270 grados de aire visible que mide 32 mm para una comodidad lujosa, estas zapatillas cuentan con una suela con agarre para que sigas pisando en las calles. Terminado con el icónico logo Swoosh en la pared lateral y la marca Air Max en la lengüeta.', '150,00', '170', '1', '/imgs/products-users/DB/DB-prodNike3.jpg', '2021-01-17 19:20:26', '2021-01-17 19:20:26', '1');
INSERT INTO `products` (`id`, `name`, `description`, `price`, `stock`, `active`, `photo`, `created_at`, `updated_at`, `provider_id`) VALUES (NULL, 'Puma RS-Fast Universe', 'Ponte lo último de PUMA con estas zapatillas RS-Fast Universe para hombre. Exclusivas de JD, estas zapatillas inspiradas en el archivo tienen una parte superior textil transpirable con superposiciones de cuero sintético suave. Vienen en una combinación de colores negro y gris, y cuentan con un cierre de cordones tonal y una entresuela RS gruesa debajo de los pies para una amortiguación ligera. Con una banda de rodadura de goma adherente, estas zapatillas tienen un acabado con detalles reflectantes para que no te vean después del anochecer, así como un clip de talón iridiscente y la marca PUMA.', '120,00', '100', '1', '/imgs/products-users/DB/DB-prodPuma1.jpg', '2021-01-17 19:33:59', '2021-01-17 19:33:59', '3');
INSERT INTO `products` (`id`, `name`, `description`, `price`, `stock`, `active`, `photo`, `created_at`, `updated_at`, `provider_id`) VALUES (NULL, 'Puma RS-Fast Intro', 'Da un paso adelante con un estilo fresco con estos entrenadores RS-Fast para hombre de PUMA. Tomando señales de los archivos, estas zapatillas de inspiración retro tienen una parte superior de tela transpirable con superposiciones de cuero para mayor soporte. Vienen en una combinación de colores blancos frescos con toques de rojo y negro, y cuentan con un cierre de cordones seguro y una entresuela con sistema RS grueso para una amortiguación ligera. Terminado con un tirador tejido en el talón y la firma PUMA.', '80,00', '50', '1', '/imgs/products-users/DB/DB-prodPuma2.jpg', '2021-01-17 19:33:59', '2021-01-17 19:33:59', '3');
INSERT INTO `products` (`id`, `name`, `description`, `price`, `stock`, `active`, `photo`, `created_at`, `updated_at`, `provider_id`) VALUES (NULL, 'Nike MX-720-818', 'Inspo de los trajes espaciales, estos entrenadores MX-720-818 para hombre de Nike le dan un aspecto futurista a tu rotación. Con una combinación de colores Enigma Stone y Iron Grey, estos creps tienen una parte superior textil con costuras expuestas que crean una apariencia acolchada, mientras que los detalles de ante brindan un soporte premium. Con lengüetas de tracción tipo ACG, se asientan en la unidad de suela 720 de Nike para una mayor amortiguación. Con una suela transparente que tiene ráfagas de color que asienten con la cabeza a las galaxias distantes, estas zapatillas se completan con el icónico logotipo de Swoosh.', '190,00', '50', '1', '/imgs/products-users/DB/DB-prodNike4.jpg', '2021-01-17 19:20:26', '2021-01-17 19:20:26', '1');


/**
    orders
 */
INSERT INTO `orders` (`id`, `state`, `address`, `created_at`, `updated_at`, `user_id`, `dealer_id`) VALUES (NULL, '1', 'C/ Góngora, Nº25 1ºA', '2021-01-17 19:41:19', '2021-01-17 19:41:19', '1', '4');
INSERT INTO `orders` (`id`, `state`, `address`, `created_at`, `updated_at`, `user_id`, `dealer_id`) VALUES (NULL, '1', 'C/ Goya, Nº5 2ºB', '2021-01-17 19:41:19', '2021-01-17 19:41:19', '1', '4');
INSERT INTO `orders` (`id`, `state`, `address`, `created_at`, `updated_at`, `user_id`, `dealer_id`) VALUES (NULL, '1', 'C/ Isabel la Católica, Nº 33 3ºC', '2021-01-17 19:41:19', '2021-01-17 19:41:19', '2', '4');
INSERT INTO `orders` (`id`, `state`, `address`, `created_at`, `updated_at`, `user_id`, `dealer_id`) VALUES (NULL, '1', 'C/ San Nicolas, Nº3 2ºD', '2021-01-17 19:41:19', '2021-01-17 19:41:19', '2', '4');
INSERT INTO `orders` (`id`, `state`, `address`, `created_at`, `updated_at`, `user_id`, `dealer_id`) VALUES (NULL, '1', 'C/ El Camí Nº18 (bajo)', '2021-01-17 19:41:19', '2021-01-17 19:41:19', '3', '4');
INSERT INTO `orders` (`id`, `state`, `address`, `created_at`, `updated_at`, `user_id`, `dealer_id`) VALUES (NULL, '1', 'AV. Hispanidad, Nº31 3ºA', '2021-01-17 19:41:19', '2021-01-17 19:41:19', '3', '4');

/**
    orderLines
 */
INSERT INTO `order_lines` (`id`, `quantity`, `price`, `discount`, `order_id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES (NULL, '2', '10', '0', '1', '1', '1', '2021-01-17 19:45:27', '2021-01-17 19:45:27');
INSERT INTO `order_lines` (`id`, `quantity`, `price`, `discount`, `order_id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES (NULL, '5', '10', '20', '2', '1', '6', '2021-01-17 19:45:27', '2021-01-17 19:45:27');
INSERT INTO `order_lines` (`id`, `quantity`, `price`, `discount`, `order_id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES (NULL, '4', '10', '0', '3', '2', '2', '2021-01-17 19:45:27', '2021-01-17 19:45:27');
INSERT INTO `order_lines` (`id`, `quantity`, `price`, `discount`, `order_id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES (NULL, '6', '10', '50', '4', '2', '5', '2021-01-17 19:45:27', '2021-01-17 19:45:27');
INSERT INTO `order_lines` (`id`, `quantity`, `price`, `discount`, `order_id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES (NULL, '3', '10', '70', '5', '3', '3', '2021-01-17 19:45:27', '2021-01-17 19:45:27');
INSERT INTO `order_lines` (`id`, `quantity`, `price`, `discount`, `order_id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES (NULL, '4', '10', '0', '6', '3', '4', '2021-01-17 19:45:27', '2021-01-17 19:45:27');
