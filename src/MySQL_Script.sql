SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE;
SET SQL_MODE='ALLOW_INVALID_DATES';

USE odsp2;

-- Tabla: user
CREATE TABLE IF NOT EXISTS `user` (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) DEFAULT NULL,
    nickname VARCHAR(100) DEFAULT NULL,
    profile_image VARCHAR(255) DEFAULT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    isAdmin TINYINT(1) NOT NULL DEFAULT 0,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    UNIQUE KEY ux_user_email (email)
) ENGINE=InnoDB;

-- Tabla: gimcana
CREATE TABLE IF NOT EXISTS gimcana (
    id_gimcana INT UNSIGNED NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    description VARCHAR(600) DEFAULT NULL,
    start_date DATETIME NOT NULL,
    end_date DATETIME NOT NULL,
    image VARCHAR(255) DEFAULT NULL,
    location VARCHAR(255) DEFAULT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id_gimcana)
) ENGINE=InnoDB;

-- Tabla: ods
CREATE TABLE IF NOT EXISTS ods (
    id_ods INT UNSIGNED NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    description TEXT DEFAULT NULL,
    text TEXT DEFAULT NULL,
    PRIMARY KEY (id_ods)
) ENGINE=InnoDB;

-- Tabla: ods_CMS_registers
CREATE TABLE IF NOT EXISTS ods_CMS_registers (
    id_ods_cms_register INT UNSIGNED NOT NULL AUTO_INCREMENT,
    id_ods INT UNSIGNED NOT NULL, -- FK a ods
    title VARCHAR(255) DEFAULT NULL,
    description TEXT DEFAULT NULL,
    question JSON DEFAULT NULL,
    possible_answers JSON DEFAULT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id_ods_cms_register),
    CONSTRAINT fk_ods_cms_ods FOREIGN KEY (id_ods) REFERENCES ods(id_ods) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

-- Tabla: quest
CREATE TABLE IF NOT EXISTS quest (
    id_quest INT UNSIGNED NOT NULL AUTO_INCREMENT,
    type VARCHAR(100) DEFAULT NULL,
    location VARCHAR(255) DEFAULT NULL,
    question TEXT DEFAULT NULL,            
    possible_answers TEXT DEFAULT NULL,    
    id_gimcana INT UNSIGNED NOT NULL,      -- FK gimcana
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id_quest),
    CONSTRAINT fk_quest_gimcana FOREIGN KEY (id_gimcana) REFERENCES gimcana(id_gimcana) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

-- Tabla: comment
CREATE TABLE IF NOT EXISTS comment (
    id_comment INT UNSIGNED NOT NULL AUTO_INCREMENT,
    comment TEXT NOT NULL,
    published_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    is_published TINYINT(1) DEFAULT 1,
    valoration INT DEFAULT NULL, 
    id_user INT UNSIGNED NOT NULL,     -- FK user
    id_gimcana INT UNSIGNED NOT NULL,  -- FK gimcana
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id_comment),
    CONSTRAINT fk_comment_user FOREIGN KEY (id_user) REFERENCES `user`(id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_comment_gimcana FOREIGN KEY (id_gimcana) REFERENCES gimcana(id_gimcana) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

-- Tabla: mark (puntuación)
CREATE TABLE IF NOT EXISTS mark (
    id_mark INT UNSIGNED NOT NULL AUTO_INCREMENT,
    mark INT NOT NULL,
    user_id INT UNSIGNED NOT NULL,     -- FK user
    quest_id INT UNSIGNED NOT NULL,    -- FK quest
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id_mark),
    CONSTRAINT ux_mark_user_quest UNIQUE (user_id, quest_id),
    CONSTRAINT fk_mark_user FOREIGN KEY (user_id) REFERENCES `user`(id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_mark_quest FOREIGN KEY (quest_id) REFERENCES quest(id_quest) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

-- Tablas de unión (N:M)

-- user_gimcana: relación N:M entre user y gimcana
CREATE TABLE IF NOT EXISTS user_gimcana (
    user_id INT UNSIGNED NOT NULL,
    gimcana_id INT UNSIGNED NOT NULL,
    joined_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (user_id, gimcana_id),
    CONSTRAINT fk_ug_user FOREIGN KEY (user_id) REFERENCES `user`(id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_ug_gimcana FOREIGN KEY (gimcana_id) REFERENCES gimcana(id_gimcana) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

-- user_ods: relación N:M entre user y ods
CREATE TABLE IF NOT EXISTS user_ods (
    user_id INT UNSIGNED NOT NULL,
    id_ods INT UNSIGNED NOT NULL,
    associated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (user_id, id_ods),
    CONSTRAINT fk_uo_user FOREIGN KEY (user_id) REFERENCES `user`(id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_uo_ods FOREIGN KEY (id_ods) REFERENCES ods(id_ods) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

-- Índices adicionales (opcional, ayudan en consultas)
CREATE INDEX idx_quest_gimcana ON quest(id_gimcana);
CREATE INDEX idx_mark_user ON mark(user_id);
CREATE INDEX idx_mark_quest ON mark(quest_id);
CREATE INDEX idx_comment_user ON comment(id_user);
CREATE INDEX idx_comment_gimcana ON comment(id_gimcana);

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
