<?php

namespace mpba\DB2\Database\Schema\Grammars;

class DB2CommunityGrammar extends DB2Grammar
{
    /**
     * Compile the query to determine the list of tables.
     *
     * @return string
     */
    public function compileTableExists()
    {
        return "SELECT tabschema, tabname FROM syscat.tables WHERE type = 'T' AND tabschema = UPPER(?) AND tabname = UPPER(?)";
    }

    /**
     * Compile the query to determine the list of columns.
     *
     * @return string
     */
    public function compileColumnExists()
    {
        return 'select column_name from syspublic.all_ind_columns where table_schema = upper(?) and table_name = upper(?)';
    }
}
