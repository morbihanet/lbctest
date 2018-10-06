create table if not exists users
(
  id             int unsigned auto_increment
    primary key,
  name           varchar(191) not null,
  email          varchar(191) not null,
  password       varchar(191) not null,
  remember_token varchar(100) null,
  created_at     timestamp    null,
  updated_at     timestamp    null,
  constraint users_email_unique
  unique (email)
)
  collate = utf8_unicode_ci;

create table if not exists contacts
(
  id         int unsigned auto_increment
    primary key,
  user_id    int unsigned not null,
  firstname  varchar(191) not null,
  lastname   varchar(191) not null,
  email      varchar(191) not null,
  created_at timestamp    null,
  updated_at timestamp    null,
  constraint contacts_id_user_id_unique
  unique (id, user_id),
  constraint contacts_user_id_foreign
  foreign key (user_id) references users (id)
    on delete cascade
)
  collate = utf8_unicode_ci;

create table if not exists addresses
(
  id         int unsigned auto_increment
    primary key,
  contact_id int unsigned not null,
  street     varchar(191) not null,
  zip        int unsigned not null,
  city       varchar(191) not null,
  country    varchar(191) not null,
  created_at timestamp    null,
  updated_at timestamp    null,
  constraint addresses_id_contact_id_unique
  unique (id, contact_id),
  constraint addresses_contact_id_foreign
  foreign key (contact_id) references contacts (id)
    on delete cascade
)
  collate = utf8_unicode_ci;

create table if not exists migrations
(
  id        int unsigned auto_increment
    primary key,
  migration varchar(191) not null,
  batch     int          not null
)
  collate = utf8_unicode_ci;

create table if not exists password_resets
(
  email      varchar(191) not null,
  token      varchar(191) not null,
  created_at timestamp    null
)
  collate = utf8_unicode_ci;

create index password_resets_email_index
  on password_resets (email);

