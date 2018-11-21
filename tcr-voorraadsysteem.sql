create table shoes (
  `id` int not null auto_increment,
  `article_number` varchar(32) not null,
  `size` int not null,
  `color` varchar(100) not null,
  `brand` varchar(200) not null,
  `price` int,
  `is_sold` tinyint not null default 0,
  primary key (`id`)
)
