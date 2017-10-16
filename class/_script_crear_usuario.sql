--Crear nuevo usuario(esquema) con el password "PASSWORD" 
CREATE USER DB_PINTEREST
  IDENTIFIED BY "oracle"
  DEFAULT TABLESPACE USERS
  TEMPORARY TABLESPACE TEMP;
--asignar cuota ilimitada al tablespace por defecto  
ALTER USER DB_PINTEREST QUOTA UNLIMITED ON USERS;

--Asignar privilegios basicos
GRANT create session TO DB_PINTEREST;
GRANT create table TO DB_PINTEREST;
GRANT create view TO DB_PINTEREST;
GRANT create any trigger TO DB_PINTEREST;
GRANT create any procedure TO DB_PINTEREST;
GRANT create sequence TO DB_PINTEREST;
GRANT create materialized view TO DB_PINTEREST;
GRANT select any table TO DB_PINTEREST;
GRANT create synonym TO DB_PINTEREST;





--En caso de que el usuario system se bloquee ejecutar lo siguiente:
--Desde la consola:


sqlplus sys as sysdba 
--ingresar el password

alter user system account unlock;
alter user system identified by "nuevo_password";


