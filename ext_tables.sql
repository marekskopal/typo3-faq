CREATE TABLE tx_msfaq_domain_model_question (
    title varchar(255) DEFAULT '' NOT NULL,
    perex text,
    answers int(11) DEFAULT '0' NOT NULL,
    sorting int(11) DEFAULT '0' NOT NULL
);
CREATE TABLE tx_msfaq_domain_model_answer (
    content mediumtext,
    question int(11) DEFAULT '0' NOT NULL,
    sorting int(11) DEFAULT '0' NOT NULL
);
