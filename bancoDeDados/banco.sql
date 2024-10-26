/*BANCO DE DADOS DO PROJETO*/
create database Unistudy default character set utf8 collate utf8_general_ci;
use Unistudy;

/*TABELAS*/
CREATE TABLE usuario (
usuarioID INT PRIMARY KEY auto_increment,
email VARCHAR(50),
nomeUsuario VARCHAR(20),
senhaUsuario VARBINARY(255)  
);

create table materias(
materiasID int primary key auto_increment,
materiasNome varchar(45),
UsuarioID int,
foreign key(UsuarioID)references usuario (UsuarioID)
);

CREATE TABLE conteudo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    materiasID INT NOT NULL,
    nome VARCHAR(50),
    FOREIGN KEY (materiasID) REFERENCES materias(materiasID)
);

create table cronograma(
cronogramaID int primary key auto_increment,
materiaNome varchar(20),
materiaID int,
diaSemana varchar(3),
horario varchar(5),
foreign key(materiaID)references materias (materiasID)
);

create table data_conclusao(
conteudoID int,
usuarioID int,
dataDeConclusao date,
FOREIGN KEY (conteudoID) REFERENCES conteudo(id),
FOREIGN KEY (usuarioID) REFERENCES usuario(usuarioID)
);

CREATE TABLE avaliacoes(
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuarioID INT NOT NULL,
    nota INT NOT NULL CHECK (nota >= 1 AND nota <= 5),
    data_avaliacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuarioID) REFERENCES usuario(usuarioID) ON DELETE CASCADE
);

/*INSERÇÃO DE DADOS NA TABELA MATERIAS*/
INSERT INTO `unistudy`.`cronograma` (`materiaNome`, `diaSemana`, `horario`) VALUES ('Português', 'seg', 'manha');
INSERT INTO `unistudy`.`cronograma` (`materiaNome`, `diaSemana`, `horario`) VALUES ('Matemática', 'seg', 'tarde');
INSERT INTO `unistudy`.`cronograma` (`materiaNome`, `diaSemana`, `horario`) VALUES ('História', 'seg', 'noite');
INSERT INTO `unistudy`.`cronograma` (`materiaNome`, `diaSemana`, `horario`) VALUES ('Química', 'seg', 'extra');
INSERT INTO `unistudy`.`cronograma` (`materiaNome`, `diaSemana`, `horario`) VALUES ('Geografia', 'ter', 'manha');
INSERT INTO `unistudy`.`cronograma` (`materiaNome`, `diaSemana`, `horario`) VALUES ('Física', 'ter', 'tarde');
INSERT INTO `unistudy`.`cronograma` (`materiaNome`, `diaSemana`, `horario`) VALUES ('Sociologia', 'ter', 'noite');
INSERT INTO `unistudy`.`cronograma` (`materiaNome`, `diaSemana`, `horario`) VALUES ('Lingua Estrangeira', 'ter', 'extra');
INSERT INTO `unistudy`.`cronograma` (`materiaNome`, `diaSemana`, `horario`) VALUES ('Artes', 'qua', 'manha');
INSERT INTO `unistudy`.`cronograma` (`materiaNome`, `diaSemana`, `horario`) VALUES ('Biologia', 'qua', 'tarde');
INSERT INTO `unistudy`.`cronograma` (`materiaNome`, `diaSemana`, `horario`) VALUES ('Literatura', 'qua', 'noite');
INSERT INTO `unistudy`.`cronograma` (`materiaNome`, `diaSemana`, `horario`) VALUES ('Leitura', 'qua', 'extra');
INSERT INTO `unistudy`.`cronograma` (`materiaNome`, `diaSemana`, `horario`) VALUES ('Redação', 'qui', 'manha');
INSERT INTO `unistudy`.`cronograma` (`materiaNome`, `diaSemana`, `horario`) VALUES ('Matemática', 'qui', 'tarde');
INSERT INTO `unistudy`.`cronograma` (`materiaNome`, `diaSemana`, `horario`) VALUES ('Física', 'qui', 'noite');
INSERT INTO `unistudy`.`cronograma` (`materiaNome`, `diaSemana`, `horario`) VALUES ('Português', 'qui', 'extra');
INSERT INTO `unistudy`.`cronograma` (`materiaNome`, `diaSemana`, `horario`) VALUES ('Matemática', 'sex', 'manha');
INSERT INTO `unistudy`.`cronograma` (`materiaNome`, `diaSemana`, `horario`) VALUES ('Redação', 'sex', 'tarde');
INSERT INTO `unistudy`.`cronograma` (`materiaNome`, `diaSemana`, `horario`) VALUES ('Leitura', 'sex', 'noite');
INSERT INTO `unistudy`.`cronograma` (`materiaNome`, `diaSemana`, `horario`) VALUES ('Simulado', 'sex', 'extra');

/*MATÉRIAS*/
INSERT INTO `unistudy`.`materias` (`materiasNome`) VALUES ('Portugues');
INSERT INTO `unistudy`.`materias` (`materiasNome`) VALUES ('Matematica');
INSERT INTO `unistudy`.`materias` (`materiasNome`) VALUES ('Historia');
INSERT INTO `unistudy`.`materias` (`materiasNome`) VALUES ('Biologia');
INSERT INTO `unistudy`.`materias` (`materiasNome`) VALUES ('Quimica');
INSERT INTO `unistudy`.`materias` (`materiasNome`) VALUES ('Geografia');
INSERT INTO `unistudy`.`materias` (`materiasNome`) VALUES ('Literatura');
INSERT INTO `unistudy`.`materias` (`materiasNome`) VALUES ('Fisica');
INSERT INTO `unistudy`.`materias` (`materiasNome`) VALUES ('Simulados');
INSERT INTO `unistudy`.`materias` (`materiasNome`) VALUES ('Lingua Estrangeira');

/*PORTUGUêS*/
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('1', 'Formacao de Formação de Palavras');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('1', 'Art. , Subst. e Adj.');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('1', 'Verbos I');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('1', 'Verbos II');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('1', 'Fundamentos Literários');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('1', 'Trovadorismo e Humanismo');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('1', 'Renascimento');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('1', 'Quinhentismo e Barroco');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('1', 'Advérbios');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('1', 'Pronomes I');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('1', 'Pronomes II');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('1', 'Pronomes III');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('1', 'Gregório de Matos e Padre Antonio Vieira');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('1', 'Neoclass. e Arcad.');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('1', 'Estét. Romântica (prosa-PT)');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('1', 'Estét. Romântica (prosa-BR)');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('1', 'Funções de Linguagem');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('1', 'Variação Linguística I');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('1', 'Variação Linguística II');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('1', 'Variação Linguística III');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('1', 'Numerais, Preposi. e interj.');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('1', 'Conjunções');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('1', 'Período Simples I');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('1', 'Período Simples II');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('1', 'Período Simples III');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('1', 'Estét. Romântica poesia');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('1', 'Estét. Realista e Realis. PT');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('1', 'Realis. no BR: Machado de A.');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('1', 'Parnasianismo e Simbol.');

/*MATREMÁTICA*/
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('2', 'Potenciação e Radiciação');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('2', 'Equações 1 grau');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('2', 'Equações 2 grau');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('2', 'Teoria dos Conjuntos');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('2', 'Trigon. no triângulo ret.');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('2', 'Produtos Notáveis');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('2', 'Fatoração');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('2', 'Conjuntos Numéricos');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('2', 'Introdução a geo. plana');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('2', 'Âng. em triâng. e circunf.');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('2', 'Razão Prop., Teo. Tales e da Bissetriz Int.');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('2', 'Pontos Not. de um triâng.');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('2', 'Operações com intervalos');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('2', 'Inequações 1 e 2 grau');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('2', 'Relações, funções e def.');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('2', 'Funções do 1 grau');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('2', 'Razão, proporção e grand. prop.');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('2', 'Teorema fund. da Aritmética, MMC e MDC');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('2', 'Porcentagem');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('2', 'Acréscimos e descontos');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('2', 'Semelhança de triâng.');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('2', 'Rel. métricas no triâng. ret.');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('2', 'Trigonometria');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('2', 'Função polinomial do 2 grau');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('2', 'Equa., ineq. e func. exp.');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('2', 'Def. e prop. dos logaritmos');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('2', 'Equa. , ineq. e sist. equa. logarít.');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('2', 'Juros simples e compostos');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('2', 'Conceitos Trigonométricos');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('2', 'Polígonos');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('2', 'Áreas quadril. e razão de semel. p/ áreas');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('2', 'Área do círculo, setor e seg. circular');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('2', 'Poliedros e noções de geo. métrica de posição');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('2', 'Prismas');

/*HISTÓRIA*/
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('3', 'A arte pré-histórica');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('3', 'A arte na ant.: Egito e Mesopotâmia');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('3', 'Ant. Clássica: A arte Grega I');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('3', 'História e Pré- história');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('3', 'Ant. Clássica');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('3', 'Civilização Grega I');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('3', 'Civilização Grega II e Civ. Roamana');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('3', 'Formação de Portugal e Navg. Ultramiarinas');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('3', 'América pré-colombiana');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('3', 'Período pré-colonial');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('3', 'Economia colonial e sociedade e inv. Holandesas');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('3', 'A arte Romana');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('3', 'A arte Medieval');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('3', 'A arte Renascentista I');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('3', 'A arte Renascentista II');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('3', 'Civilização Romana');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('3', 'Civ. Muçul. e Reino Franco');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('3', 'Sis. Feudal, Igreja Cat. e Sacro Imp. Romano-Germ.');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('3', 'Band., Miner. e Trat. de Lim.');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('3', 'Sist.Colonial, Revoltas Natv. e Mov. Emanp.');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('3', 'Períodos Pombalino e Joanino');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('3', 'Independência do BR e América ES');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('3', 'Baixa idade média');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('3', 'Renascimento Cultural e científico');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('3', 'Reforma e Contrarreforma');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('3', 'Antigo Regime');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('3', 'Monarq, e Rev. Inglesas');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('3', 'Iluminismo');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('3', 'Primeiro Reinado');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('3', 'Regência e Segundo Reinado');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('3', 'Crise do Império');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('3', 'República da Espada');

/*BIOLOGIA*/
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('4', 'Origem da vida');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('4', 'Evidências evolutivas');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('4', 'Teorias evolutivas');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('4', 'Taxonomia e Reinos');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('4', 'Vírus');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('4', 'Reino Monera');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('4', 'Reino protoctista I: Protozoários');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('4', 'Composição química celular I - III');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('4', 'Código genético e síntese proteica');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('4', 'Pirâmides e eficiência Ecológicas');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('4', 'Relações Ecológicas');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('4', 'Dinâmica populacional e sucessão ecológica');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('4', 'Reino protoctista II: Algas');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('4', 'Poríferos e cnidários');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('4', 'Platelmintos');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('4', 'Nematelmintos');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('4', 'Introdução à citologia');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('4', 'Citoplasma');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('4', 'Núcleo');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('4', 'Divisão celular: mitose');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('4', 'Biomas');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('4', 'Biomas Aquáticos');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('4', 'Ciclo Biogeoquímicos');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('4', 'Problemas Ambientais');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('4', 'Tipos de Reprodução e Ciclos de vida');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('4', 'Moluscos');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('4', 'Anelídeos');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('4', 'Artrópodes e Quinodermos');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('4', 'Cordados I');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('4', 'Cordados II');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('4', 'Meiose e variabilidade genética');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('4', 'Gametogênese');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('4', 'Histologia I e II');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('4', 'Respiração celular e fermentação');

/*QUÍMICA*/
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('5', 'Modelos e estruturas atômicas');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('5', 'Íons e Distribuição eletônica');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('5', 'Tabela Periódica');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('5', 'Propriedades Periódicas');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('5', 'Propriedades de matéria');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('5', 'Diagramas e mudanças de estados');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('5', 'Sistemas');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('5', 'Análise Imediata');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('5', 'Grandezas Químicas ');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('5', 'Fórmulas e Leis Ponderais');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('5', 'Introdução à Estequiometria');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('5', 'Estequiometria');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('5', 'Ligação Iônica');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('5', 'Ligações covalente e metálica');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('5', 'Geometria e polaridade moleculares');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('5', 'Forças Intermoleculares');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('5', 'Radioatividade');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('5', 'Cinética dos decaimentos radioativos');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('5', 'Introdução a quim. Orgânica');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('5', 'Hidrocarbonetos');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('5', 'Leis físicas dos gases');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('5', 'Transformações Gasosas');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('5', 'Misturas Gasosas');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('5', 'Densidade dos Gases, Efusão e Difusão Gasosa');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('5', 'Ácidos');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('5', 'Bases');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('5', 'Sais');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('5', 'Eletólitos');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('5', 'Óxidos Iônicos');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('5', 'Funções Orgânicas I - III');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('5', 'Outras funçôes orgânicas');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('5', 'Isomeria Plana');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('5', 'Solubilidade');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('5', 'Concentrações comum e molar');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('5', 'Título e partes por milhão');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('5', 'Diluição e Mistura de Soluções');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('5', 'Mistura de Soluções com reação');

/*GEOGRAFIA*/
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('6', 'Movimentos da Terra');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('6', 'Coordenadas geográficas e fuso horário');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('6', 'Noções de Cartografia');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('6', 'Elementos do clima e fatores climáticos');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('6', 'A história do pensamento Geográfico');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('6', 'Geologia');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('6', 'Geologia BR e Exploração mineral');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('6', 'Gemorfologia');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('6', 'Dinâmicas Climáticas');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('6', 'Climas do BR e do Mundo');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('6', 'Hidrologia e Bacias Hidrográficas');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('6', 'Classificação do Relevo');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('6', 'Solos');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('6', 'Problemas ambientais mundiais');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('6', 'Grandes biomas do mundoi');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('6', 'Dominios Morfoclimáticos II');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('6', 'Problemas ambientais do Brasil');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('6', 'Conferências e protocolos para o meio ambiente');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('6', 'Regionalização do espaço brasileiro');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('6', 'Sistemas Agrários');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('6', 'Antiga ordem mundial');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('6', 'Globalização e Blocos econômicos');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('6', 'Comércio internacional');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('6', 'Regiões socioeconômicas mundiais');

/*LITERATURA*/
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('7', 'Marília de Dirceu');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('7', 'Quincas Borba');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('7', 'Alguma Poesia');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('7', 'Mensagem');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('7', 'Angústia');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('7', 'Romanceiro da Inconfidência');

/*FÍSICA*/
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('8', 'Introd. ao estudo dos movimentos');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('8', 'M.r.u. e gráficos');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('8', 'M.r.u.v. e gráficos');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('8', 'Queda livre e lançamento vertical');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('8', 'Calorimetria');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('8', 'Grandezas físicas');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('8', 'Introd.aos fenômenos térmicos');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('8', 'Estudo do calor sensível');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('8', 'Mudanças de estado');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('8', 'Eletrostática');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('8', 'Vetores');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('8', 'Princ. da eletrostática');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('8', 'Lei de Coulomb');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('8', 'Campo elétrico');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('8', 'Lançamentos horizontal e oblíquo');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('8', 'Cinemática vetorial');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('8', 'Mov. circular');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('8', 'Transmissão de mov. circular');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('8', 'Termodinâmica');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('8', 'Transmissão de calor');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('8', 'Expansão térmica de sólidos e líquidos');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('8', 'Lei geral dos gases');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('8', '1 lei da termodinâmica');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('8', 'Força elétrica e campo elétrico');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('8', 'Potencial elétrico');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('8', 'Trabalho no campo elétrico');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('8', 'Pot.elétrico no ceu e equi. eletrostático');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('8', 'Introd. leis de Newton');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('8', 'F. peso, normal, tração e sist. de corpos');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('8', 'Decomp. de forças e plano inclinado');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('8', 'Forças de atrito');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('8', 'Força elástica');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('8', 'Óptica geométrica');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('8', 'Seg. lei da termodinâmica');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('8', 'Introd. à óptica geométrica');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('8', 'Espelhos planos I');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('8', 'Espelhos planos II');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('8', 'Espelhos esféricos: estudo geométrico');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('8', 'Eletrodinâmica');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('8', 'Corrente elétrica');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('8', 'Assoc. de resistores em série');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('8', 'Assoc. de resistores em paralelo');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('8', 'Potência dissipada por efeito Joule');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('8', 'Amperímetro, voltímetro e ponte de Wheatstone');

/*SIMULADOS*/
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('9', 'ENEM 1 dia (17/02)');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('9', 'ENEM 2 dia (24/02)');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('9', 'ENEM 1 dia (20/04)');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('9', 'ENEM 2 dia (27/04)');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('9', 'Unesp (09/03)');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('9', 'Fuvest 1 fase (16/03)');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('9', 'Unicamp (23/03)');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('9', 'Famerp 1 (06/04)');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('9', 'Famerp 2 (13/04)');

/*LINGUA ESTRANGEIRA*/
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('10', 'Overview and analysis');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('10', 'Do you understand');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('10', 'Who is who?');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('10', 'The here and now');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('10', 'Focus on the past');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('10', 'Looking forward');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('10', 'Should we continue');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('10', 'Perfection');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('10', 'Prepositions');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('10', 'Dont forget');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('10', 'Picture round');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('10', 'Are you the one who understands');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('10', 'Furthermore');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('10', 'Look here');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('10', 'How am i? clarifying');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('10', 'Gerund/Infinitive');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('10', 'Thinking bigger');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('10', 'Literature');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('10', 'What is going on now?');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('10', 'Up to you!');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('10', 'Action');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('10', 'Analyzing songs lyrics');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('10', 'Conditional');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('10', 'Reported Speech');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('10', 'Important Notice');
INSERT INTO `unistudy`.`conteudo` (`materiasID`, `nome`) VALUES ('10', 'Focused on ENEM');