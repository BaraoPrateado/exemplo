@extends('layouts.app')
@section('content')
    <div class="container">
        <h3 align="center" class="mt-5">Cadastro de Funcionário</h3>
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
            <div class="form-area">
                <form method="POST" action="{{ route('employee.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>Nome do Usuário</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="col-md-6">
                            <label>Data de Nascimento</label>
                            <input type="date" class="form-control" name="dob">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>CPF</label>
                            <input type="text" class="form-control" name="cpf">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <input type="submit" class="btn btn-info" value="Registrar">
                        </div>
                    </div>
                </form>
            </div>
                <table class="table mt-5">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome do Usuário</th>
                        <th scope="col">Data de Nascimento</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Ação</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ( $employees as $key => $employee )
                        <tr>
                            <td scope="col">{{ ++$key }}</td>
                            <td scope="col">{{ $employee->name }}</td>
                            <td scope="col">{{ $employee->dob }}</td>
                            <td scope="col">{{ $employee->cpf }}</td>
                            <td scope="col">
                            <a href="{{  route('employee.edit', $employee->id) }}">
                            <button class="btn btn-primary btn-sm">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar
                            </button>
                            </a>
                            
                            <form action="{{ route('employee.destroy', [$employee->id]) }}" method="POST" style ="display:inline">
                             @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
                            </form>
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <style>
        .form-area{
            padding: 20px;
            margin-top: 20px;
              background-color:#b3e5fc;
        }
        .bi-trash-fill{
            color:red;
            font-size: 18px;
        }
        .bi-pencil{
            color:green;
            font-size: 18px;
            margin-left: 20px;
        }
    </style>
@endpush