<?php
    namespace app\Models;

    class BranchesModel extends Models {
        function getBranches(){
            $result  = $this->db->query(
                "SELECT <A.id_sucursal>, <A.clasificacion>, <A.nombre_desc>, <A.registroSAA>, <F.cedulaProfesional>, <F.id_medico> AS medico_id, <G.especialidad>, <A.rfc>, <A.direccion>, <E.colonia>, <D.estado>, <C.municipio>, <B.ciudad>, <A.codigoPostal>, <A.telefono>, <A.encargado>, <A.cantidad_empleados>, <A.hora_apertura>, <A.hora_cirre>, <A.almacen>, <A.almacen_medicamentos>, <A.noExterior>, <A.noInterior>, <A.codigoCentroCosto>, <A.numEstablecimiento>
                FROM <sucursales> A
                JOIN <ciudad> B ON <B.id_ciudad> = <A.id_ciudad>
                JOIN <municipio> C ON <C.id_municipio> = <A.id_medico>
                JOIN <estado> D ON <D.id_estado> = <A.id_municipio>
                JOIN <colonia> E ON <E.id_colonia> = <A.id_colonia>
                JOIN <medico> F ON <F.id_medico> = <A.id_medico>
                JOIN <especialidad_medicas> G ON <G.id_especialidad> = <F.id_especialidad>"
            )->fetchAll(\PDO::FETCH_ASSOC);
            
            if(!is_null($this->db->error()[1])){
                return array('error'=>true,'description'=>$this->db->error()[2]);
            }else if(empty($result)){
                return array('notFound'=>true,'description'=>'The result is empty');
            }
            return array('success'=>true, 'description'=>'The admins were found','result'=>$result);
        
        }
    }
?>