@extends('pm.layouts.master')

@section('css')
@endsection

@section('body')
    <div class="bg-dark" style="border-radius:24px 0px 0px 0px">
        <div class="content header-content container-fluid" style="height: 25rem;border-radius:24px 0px 0px 0px">
            <!-- Page Header -->
            <div class="page-header page-header-light">
                <div class="row align-items-center g-3">
                    <div class="col">
                        <h1 class="page-header-title">Dashboard</h1>
                    </div>
                    <!-- End Col -->

                    <div class="col-auto">
                        <!-- Daterangepicker -->
                        <button id="js-daterangepicker-predefined" class="btn btn-ghost-light btn-sm dropdown-toggle">
                            <i class="bi-calendar-week"></i>
                            <span class="js-daterangepicker-predefined-preview ms-1"></span>
                        </button>
                        <!-- End Daterangepicker -->
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
            <!-- End Page Header -->
        </div>
    </div>

    <div class="content container-fluid pt-0" style="margin-top: -17rem;">
        <!-- Stats -->
        <div class="row g-3 mb-3">
            <div class="col-sm-6 col-lg-3">
                <!-- Card -->
                <a class="card card-hover-shadow h-100" href="#">
                    <div class="card-body">
                        <h6 class="card-subtitle">Nombre Total de Clients</h6>

                        <div class="row align-items-center gx-2 mb-1">
                            <div class="col-6">
                                <h2 class="card-title text-inherit">
                                    {{ convertUnit($totalClients) }}
                                </h2>
                            </div>
                            <!-- End Col -->

                            <div class="col-6">
                                <!-- Chart -->
                                <div class="chartjs-custom" style="height: 3rem;">
                                    <canvas class="js-chart"
                                        data-hs-chartjs-options='{
                                            "type": "line",
                                            "data": {
                                                "labels": {{ $clientChartData['labels'] }},
                                                "datasets": [{
                                                    "data": {{ $clientChartData['values'] }},
                                                    "backgroundColor": ["rgba(55, 125, 255, 0)", "rgba(255, 255, 255, 0)"],
                                                    "borderColor": "#377dff",
                                                    "borderWidth": 2,
                                                    "pointRadius": 0,
                                                    "pointHoverRadius": 0
                                                }]
                                            },
                                            "options": {
                                                "scales": {
                                                    "y": {
                                                    "display": false
                                                    },
                                                    "x": {
                                                    "display": false
                                                    }
                                                },
                                                "hover": {
                                                    "mode": "nearest",
                                                    "intersect": false
                                                },
                                                "plugins": {
                                                    "tooltip": {
                                                    "postfix": "",
                                                    "hasIndicator": true,
                                                    "intersect": false
                                                    }
                                                }
                                            }
                                        }'></canvas>
                                </div>
                                <!-- End Chart -->
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->

                        {{-- <span class="badge bg-soft-success text-success">
                            <i class="bi-graph-up"></i> 12.5%
                        </span>
                        <span class="text-body fs-6 ms-1">from 70,104</span> --}}
                    </div>
                </a>
                <!-- End Card -->
            </div>

            <div class="col-sm-6 col-lg-3">
                <!-- Card -->
                <a class="card card-hover-shadow h-100" href="#">
                    <div class="card-body">
                        <h6 class="card-subtitle">Nombre de pays commandé</h6>

                        <div class="row align-items-center gx-2 mb-1">
                            <div class="col-6">
                                <h2 class="card-title text-inherit">
                                    {{ convertUnit($totalCertificats) }}
                                </h2>
                            </div>
                            <!-- End Col -->

                            <div class="col-6">
                                <!-- Chart -->
                                <div class="chartjs-custom" style="height: 3rem;">
                                    <canvas class="js-chart"
                                        data-hs-chartjs-options='{
                                            "type": "line",
                                            "data": {
                                                "labels": {{ $certificatChartData['labels'] }},
                                                "datasets": [{
                                                    "data": {{ $certificatChartData['values'] }},
                                                    "backgroundColor": ["rgba(55, 125, 255, 0)", "rgba(255, 255, 255, 0)"],
                                                    "borderColor": "#377dff",
                                                    "borderWidth": 2,
                                                    "pointRadius": 0,
                                                    "pointHoverRadius": 0
                                                }]
                                            },
                                            "options": {
                                                "scales": {
                                                    "y": {
                                                        "display": false
                                                    },
                                                    "x": {
                                                        "display": false
                                                    }
                                                },
                                                "hover": {
                                                    "mode": "nearest",
                                                    "intersect": false
                                                },
                                                "plugins": {
                                                    "tooltip": {
                                                    "postfix": "k",
                                                    "hasIndicator": true,
                                                    "intersect": false
                                                    }
                                                }
                                            }
                                        }'>
                                    </canvas>
                                </div>
                                <!-- End Chart -->
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->

                        {{-- <span class="badge bg-soft-success text-success">
                            <i class="bi-graph-up"></i> 1.7%
                        </span>
                        <span class="text-body fs-6 ms-1">from 29.1%</span> --}}
                    </div>
                </a>
                <!-- End Card -->
            </div>

            <div class="col-sm-6 col-lg-3">
                <!-- Card -->
                <a class="card card-hover-shadow h-100" href="#">
                    <div class="card-body">
                        <h6 class="card-subtitle">Nombre total de Projets</h6>

                        <div class="row align-items-center gx-2 mb-1">
                            <div class="col-6">
                                <h2 class="card-title text-inherit">
                                    {{ convertUnit($totalProjects) }}
                                </h2>
                            </div>
                            <!-- End Col -->

                            <div class="col-6">
                                <!-- Chart -->
                                <div class="chartjs-custom" style="height: 3rem;">
                                    <canvas class="js-chart"
                                        data-hs-chartjs-options='{
                                            "type": "line",
                                            "data": {
                                            "labels": {{ $projectChartData['labels'] }},
                                                "datasets": [{
                                                    "data": {{ $projectChartData['values'] }},
                                                    "backgroundColor": ["rgba(55, 125, 255, 0)", "rgba(255, 255, 255, 0)"],
                                                    "borderColor": "#377dff",
                                                    "borderWidth": 2,
                                                    "pointRadius": 0,
                                                    "pointHoverRadius": 0
                                                }]
                                            },
                                            "options": {
                                                "scales": {
                                                    "y": {
                                                        "display": false
                                                    },
                                                    "x": {
                                                        "display": false
                                                    }
                                                },
                                                "hover": {
                                                    "mode": "nearest",
                                                    "intersect": false
                                                },
                                                "plugins": {
                                                    "tooltip": {
                                                        "postfix": "k",
                                                        "hasIndicator": true,
                                                        "intersect": false
                                                    }
                                                }
                                            }
                                        }'>
                                    </canvas>
                                </div>
                                <!-- End Chart -->
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->

                        {{-- <span class="badge bg-soft-danger text-danger">
                            <i class="bi-graph-down"></i> 4.4%
                        </span>
                        <span class="text-body fs-6 ms-1">from 61.2%</span> --}}
                    </div>
                </a>
                <!-- End Card -->
            </div>

            <div class="col-sm-6 col-lg-3">
                <!-- Card -->
                <a class="card card-hover-shadow h-100" href="#">
                    <div class="card-body">
                        <h6 class="card-subtitle">Montant généré</h6>

                        <div class="row align-items-center gx-2 mb-1">
                            <div class="col-6">
                                <h2 class="card-title text-inherit">
                                    {{ convertUnit($transactionMontant) }} $
                                </h2>
                            </div>
                            <!-- End Col -->

                            <div class="col-6">
                                <!-- Chart -->
                                <div class="chartjs-custom" style="height: 3rem;">
                                    <canvas class="js-chart"
                                        data-hs-chartjs-options='{
                                        "type": "line",
                                        "data": {
                                        "labels": {{ $transactionChartData['labels'] }},
                                        "datasets": [{
                                            "data": {{ $transactionChartData['values'] }},
                                            "backgroundColor": ["rgba(55, 125, 255, 0)", "rgba(255, 255, 255, 0)"],
                                            "borderColor": "#377dff",
                                            "borderWidth": 2,
                                            "pointRadius": 0,
                                            "pointHoverRadius": 0
                                        }]
                                        },
                                        "options": {
                                        "scales": {
                                            "y": {
                                            "display": false
                                            },
                                            "x": {
                                            "display": false
                                            }
                                        },
                                        "hover": {
                                            "mode": "nearest",
                                            "intersect": false
                                        },
                                        "plugins": {
                                            "tooltip": {
                                            "postfix": "k",
                                            "hasIndicator": true,
                                            "intersect": false
                                            }
                                        }
                                        }
                                    }'>
                                    </canvas>
                                </div>
                                <!-- End Chart -->
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->

                        {{-- <span class="badge bg-soft-secondary text-body">0.0%</span>
                        <span class="text-body fs-6 ms-1">from 2,913</span> --}}
                    </div>
                </a>
                <!-- End Card -->
            </div>
        </div>
        <!-- End Stats -->

        <div class="row g-3 mb-3">
            <div class="col-12">
                <div class="card">
                    <!-- Header -->
                    {{-- <div class="card-header card-header-content-sm-between">
                        <h4 class="card-header-title mb-2 mb-sm-0">Projets du mois</h4>

                        <!-- Nav -->
                        {{-- <ul class="nav nav-segment nav-fill" id="projectsTab" role="tablist">
                            <li class="nav-item" data-bs-toggle="chart" data-datasets="0" data-trigger="click"
                                data-action="toggle">
                                <a class="nav-link active" href="javascript:;" data-bs-toggle="tab">This week</a>
                            </li>
                            <li class="nav-item" data-bs-toggle="chart" data-datasets="1" data-trigger="click"
                                data-action="toggle">
                                <a class="nav-link" href="javascript:;" data-bs-toggle="tab">Last week</a>
                            </li>
                        </ul> -}}
                        <!-- End Nav -->
                    </div> --}}
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <div class="row align-items-sm-center mb-4">
                            <div class="col-sm mb-3 mb-sm-0">
                                <div class="d-flex flex-col align-items-cente">
                                    <span class="h5 mb-3 d-block">Statistique des projets par étape</span>
                                    <span class="h1 mb-1 d-block">Total</span>
                                    <span class="h4 mb-0">1 Projets</span>

                                    {{-- <span class="text-success ms-2">
                                        <i class="bi-graph-up"></i> 25.3%
                                    </span> --}}
                                </div>
                            </div>
                            <!-- End Col -->

                            <div class="col-sm-auto w-70">
                                <!-- Legend Indicators -->
                                <div class="row fs-6">
                                    @php
                                        $colors = [];
                                        $red = [];
                                        $green = [];
                                        $blue = [];
                                    @endphp
                                    @foreach ($projectStatuts as $key => $statut)
                                        @php
                                            $hexa = Str::padLeft(dechex(mt_rand(0, 0xffffff)), 6, '0');
                                            $colors[$key] = '#' . $hexa;
                                            $red[$key] = hexdec(substr($hexa, 0, 2));
                                            $green[$key] = hexdec(substr($hexa, 2, 2));
                                            $blue[$key] = hexdec(substr($hexa, 4, 6));
                                        @endphp
                                        <div class="col-4">
                                            <span class="legend-indicator" style="background: {{ $colors[$key] }}"></span>
                                            {{ $statut->titre }}
                                        </div>
                                    @endforeach
                                    {{-- <div class="col-auto">
                                        <span class="legend-indicator bg-info"></span> Expenses
                                    </div> --}}
                                </div>
                                <!-- End Legend Indicators -->
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->

                        <!-- Bar Chart -->
                        <div class="chartjs-custom" style="height: 18rem;">
                            <canvas id="updatingLineChart"
                                data-hs-chartjs-options='{
                                  "type": "line",
                                  "data":
                                    {
                                        "labels": [
                                            @for ($i = 1; $i < 13; $i++)
                                                "{{ Str::ucfirst(now()->month($i)->isoFormat('MMM')) }}"
                                                @if ($i < 12)
                                                ,
                                                @endif
                                            @endfor
                                            {{-- "Feb","Jan","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec" --}}
                                        ],
                                        "datasets": [
                                            @foreach ($projectStatuts as $key => $statut)
                                                {
                                                    "backgroundColor": ["rgba({{ $red[$key] }},{{ $green[$key] }},{{ $blue[$key] }}, .5)", "rgba(255, 255, 255, .2)"],
                                                    "borderColor": "{{ $colors[$key] }}",
                                                    "borderWidth": 2,
                                                    "pointRadius": 0,
                                                    "hoverBorderColor": "{{ $colors[$key] }}",
                                                    "pointBackgroundColor": "{{ $colors[$key] }}",
                                                    "pointBorderColor": "#fff",
                                                    "pointHoverRadius": 0,
                                                    "tension": 0.4
                                                }
                                                @if (!$loop->last)
                                                ,
                                                @endif
                                            @endforeach
                                        ]
                                    },
                                    "options": {
                                        "gradientPosition": {
                                            "y1": 200
                                        },
                                        "scales": {
                                            "y": {
                                                "grid": {
                                                "color": "#e7eaf3",
                                                "drawBorder": false,
                                                "zeroLineColor": "#e7eaf3"
                                            },
                                            "ticks": {
                                                "min": 0,
                                                "max": 100,
                                                "stepSize": 20,
                                                "fontColor": "#97a4af",
                                                "fontFamily": "Open Sans, sans-serif",
                                                "padding": 10,
                                                "postfix": "k"
                                            }
                                        },
                                        "x": {
                                            "grid": {
                                                "display": false,
                                                "drawBorder": false
                                            },
                                            "ticks": {
                                                "fontSize": 12,
                                                "fontColor": "#97a4af",
                                                "fontFamily": "Open Sans, sans-serif",
                                                "padding": 5
                                            }
                                        }
                                    },
                                    "plugins": {
                                        "tooltip": {
                                            "prefix": "",
                                            "postfix": "",
                                            "hasIndicator": true,
                                            "mode": "index",
                                            "intersect": false,
                                            "lineMode": true,
                                            "lineWithLineColor": "rgba(19, 33, 68, 0.075)"
                                        }
                                    },
                                    "hover": {
                                      "mode": "nearest",
                                      "intersect": false
                                    }
                                  }
                                }'>
                            </canvas>
                        </div>
                        <!-- End Bar Chart -->
                    </div>
                    <!-- End Body -->

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-borderless table-thead-bordered table-align-middle card-table">
                            <thead class="thead-light">
                                <tr>
                                    <th>Pays</th>
                                    <th>Client</th>
                                    <th>Equipe</th>
                                    <th>Date cloture</th>
                                    <th>Prochaine màj</th>
                                    <th>Completion</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($projects as $project)
                                    @php
                                        $random = rand(1, 4);
                                    @endphp
                                    <tr>
                                        <td>
                                            <a class="d-flex align-items-center" href="project.html">
                                                @if (File::exists(public_path('/assets/vendor/flag-icon-css/flags/1x1/' . Str::lower($project->certificat->country->code) . '.svg')))
                                                    <div class="flex-shrink-0">
                                                        <img class="avatar avatar-sm" src="{{ asset('assets/vendor/flag-icon-css/flags/1x1/' . Str::lower($project->certificat->country->code) . '.svg') }}"
                                                            alt="Image Description">
                                                    </div>
                                                @else
                                                    <div class="avatar @if ($random == 1) avatar-soft-primary @elseif($random == 2) avatar-soft-dark @elseif($random == 3) avatar-soft-info @else avatar-soft-danger @endif  avatar-circle">
                                                        <span class="avatar-initials">
                                                            {{ Str::upper($certificat->country->name_fr[0]) }}
                                                        </span>
                                                    </div>
                                                @endif
                                                <div class="flex-grow-1 ms-3">
                                                    <span class="d-block h5 text-inherit mb-0">
                                                        {{ $project->certificat->country->name_fr ?? $projet->certificat->country->name_en }}
                                                    </span>
                                                </div>
                                            </a>
                                        </td>
                                        <td>
                                            <span class="h6">
                                                {{ $project->customer->societe->nom ?? 'nulle' }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="mb-0">$25,000</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="mb-0">34</span>
                                                <span class="badge bg-soft-danger text-danger p-1 ms-2">
                                                    <i class="bi-graph-down"></i> 1.8
                                                </span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                @php
                                                    $etape = 0;
                                                    foreach ($projectStatuts as $key => $etapeProjet) {
                                                        if ($etapeProjet->id == $project->notes->last()->etape->id) {
                                                            $etape = $key + 1;
                                                        }
                                                    }
                                                    $pourc = round(($etape * $projectStatuts->count()) / 100 ,2);
                                                @endphp
                                                <span class="mb-0 me-2">{{ $pourc }}%</span>
                                                <div class="progress table-progress">
                                                    <div @class(["progress-bar", "bg-success" => $pourc == 100]) role="progressbar" style="width: {{ $pourc }}%"
                                                        aria-valuenow="{{ $pourc }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- End Table -->

                    <!-- Card Footer -->
                    <a class="card-footer text-center" href="{{ route('pm.projects.index') }}">
                        Voir tout les projets <i class="bi-chevron-right"></i>
                    </a>
                    <!-- End Card Footer -->
                </div>
            </div>
        </div>
        <!-- End Row -->

        <div class="row g-3 mb-3">

            <div class="col-lg-6 mb-3 mb-lg-0">
                <!-- Card -->
                <div class="card h-100">
                    <!-- Header -->
                    <div class="card-header card-header-content-sm-between">
                        <h4 class="card-header-title mb-2 mb-sm-0">Transactions</h4>

                        <!-- Daterangepicker -->
                        <button id="js-daterangepicker-predefined" class="btn btn-ghost-secondary btn-sm dropdown-toggle">
                            <i class="bi-calendar-week"></i>
                            <span class="js-daterangepicker-predefined-preview ms-1"></span>
                        </button>
                        <!-- End Daterangepicker -->
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chartjs-custom mx-auto" style="height: 20rem;">
                            <canvas class="js-chart-datalabels"
                                data-hs-chartjs-options='{
                            "type": "bubble",
                            "data": {
                              "datasets": [
                                {
                                  "label": "Label 1",
                                  "data": [
                                    {"x": 50, "y": 65, "r": 99}
                                  ],
                                  "color": "#fff",
                                  "backgroundColor": "rgba(55, 125, 255, 0.9)",
                                  "borderColor": "transparent"
                                },
                                {
                                  "label": "Label 2",
                                  "data": [
                                    {"x": 46, "y": 42, "r": 65}
                                  ],
                                  "color": "#fff",
                                  "backgroundColor": "rgba(100, 0, 214, 0.8)",
                                  "borderColor": "transparent"
                                },
                                {
                                  "label": "Label 3",
                                  "data": [
                                    {"x": 48, "y": 15, "r": 38}
                                  ],
                                  "color": "#fff",
                                  "backgroundColor": "#00c9db",
                                  "borderColor": "transparent"
                                },
                                {
                                  "label": "Label 3",
                                  "data": [
                                    {"x": 55, "y": 2, "r": 61}
                                  ],
                                  "color": "#fff",
                                  "backgroundColor": "#4338ca",
                                  "borderColor": "transparent"
                                }
                              ]
                            },
                            "options": {
                              "scales": {
                                "y": {
                                  "grid": {
                                    "display": false,
                                    "drawBorder": false
                                  },
                                  "ticks": {
                                    "display": false,
                                    "max": 100,
                                    "beginAtZero": true
                                  }
                                },
                                "x": {
                                "grid": {
                                    "display": false,
                                    "drawBorder": false
                                  },
                                  "ticks": {
                                    "display": false,
                                    "max": 100,
                                    "beginAtZero": true
                                  }
                                }
                              },
                              "plugins": {
                                "tooltip": false
                              }
                            }
                          }'></canvas>
                        </div>
                        <!-- End Chart -->

                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <span class="legend-indicator bg-primary"></span> New
                            </div>
                            <!-- End Col -->

                            <div class="col-auto">
                                <span class="legend-indicator" style="background-color: #7000f2;"></span> Pending
                            </div>
                            <!-- End Col -->

                            <div class="col-auto">
                                <span class="legend-indicator bg-info"></span> Failed
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->
                    </div>
                    <!-- End Body -->
                </div>
                <!-- End Card -->
            </div>

            <div class="col-lg-6">
                <!-- Card -->
                <div class="card h-100">
                    <!-- Header -->
                    <div class="card-header card-header-content-between">
                        <h4 class="card-header-title">Reports overview</h4>

                        <!-- Dropdown -->
                        <div class="dropdown">
                            <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm rounded-circle"
                                id="reportsOverviewDropdown1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi-three-dots-vertical"></i>
                            </button>

                            <div class="dropdown-menu dropdown-menu-end mt-1" aria-labelledby="reportsOverviewDropdown1">
                                <span class="dropdown-header">Settings</span>

                                <a class="dropdown-item" href="#">
                                    <i class="bi-share-fill dropdown-item-icon"></i> Share reports
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="bi-download dropdown-item-icon"></i> Download
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="bi-alt dropdown-item-icon"></i> Connect other apps
                                </a>

                                <div class="dropdown-divider"></div>

                                <span class="dropdown-header">Feedback</span>

                                <a class="dropdown-item" href="#">
                                    <i class="bi-chat-left-dots dropdown-item-icon"></i> Report
                                </a>
                            </div>
                        </div>
                        <!-- End Dropdown -->
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <span class="h1 d-block mb-4">$7,431.14 USD</span>

                        <!-- Progress -->
                        <div class="progress rounded-pill mb-2">
                            <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Gross value"></div>
                            <div class="progress-bar opacity-50" role="progressbar" style="width: 33%"
                                aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Net volume from sales"></div>
                            <div class="progress-bar opacity-25" role="progressbar" style="width: 9%" aria-valuenow="9"
                                aria-valuemin="0" aria-valuemax="100" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="New volume from sales"></div>
                        </div>

                        <div class="d-flex justify-content-between mb-4">
                            <span>0%</span>
                            <span>100%</span>
                        </div>
                        <!-- End Progress -->

                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-lg table-nowrap card-table mb-0">
                                <tr>
                                    <th scope="row">
                                        <span class="legend-indicator bg-primary"></span>Gross value
                                    </th>
                                    <td>$3,500.71</td>
                                    <td>
                                        <span class="badge bg-soft-success text-success">+12.1%</span>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">
                                        <span class="legend-indicator bg-primary opacity-50"></span>Net volume from sales
                                    </th>
                                    <td>$2,980.45</td>
                                    <td>
                                        <span class="badge bg-soft-warning text-warning">+6.9%</span>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">
                                        <span class="legend-indicator bg-primary opacity-25"></span>New volume from sales
                                    </th>
                                    <td>$950.00</td>
                                    <td>
                                        <span class="badge bg-soft-danger text-danger">-1.5%</span>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">
                                        <span class="legend-indicator"></span>Other
                                    </th>
                                    <td>32</td>
                                    <td>
                                        <span class="badge bg-soft-success text-success">1.9%</span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!-- End Table -->
                    </div>
                    <!-- End Body -->
                </div>
                <!-- End Card -->
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card overflow-hidden">
                    <!-- Header -->
                    <div class="card-header card-header-content-between">
                        <h4 class="card-header-title">Audience overview <i class="bi-patch-check-fill text-primary"
                                data-bs-toggle="tooltip" data-bs-placement="top"
                                title="This report is based on 100% of sessions."></i></h4>

                        <!-- Dropdown -->
                        <div class="dropdown">
                            <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm rounded-circle"
                                id="reportsOverviewDropdown2" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi-three-dots-vertical"></i>
                            </button>

                            <div class="dropdown-menu dropdown-menu-end mt-1" aria-labelledby="reportsOverviewDropdown2">
                                <span class="dropdown-header">Settings</span>

                                <a class="dropdown-item" href="#">
                                    <i class="bi-share-fill dropdown-item-icon"></i> Share reports
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="bi-download dropdown-item-icon"></i> Download
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="bi-alt dropdown-item-icon"></i> Connect other apps
                                </a>

                                <div class="dropdown-divider"></div>

                                <span class="dropdown-header">Feedback</span>

                                <a class="dropdown-item" href="#">
                                    <i class="bi-chat-left-dots dropdown-item-icon"></i> Report
                                </a>
                            </div>
                        </div>
                        <!-- End Dropdown -->
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <div class="row col-sm-divider">
                            <div class="col-sm-3">
                                <!-- Stats -->
                                <div class="d-lg-flex align-items-md-center">
                                    <div class="flex-shrink-0">
                                        <i class="bi-person fs-1 text-primary"></i>
                                    </div>

                                    <div class="flex-grow-1 ms-lg-3">
                                        <span class="d-block fs-6">Users</span>
                                        <div class="d-flex align-items-center">
                                            <h3 class="mb-0">34,413</h3>
                                            <span class="badge bg-soft-success text-success ms-2">
                                                <i class="bi-graph-up"></i> 12.5%
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Stats -->
                            </div>

                            <div class="col-sm-3">
                                <!-- Stats -->
                                <div class="d-lg-flex align-items-md-center">
                                    <div class="flex-shrink-0">
                                        <i class="bi-clock-history fs-1 text-primary"></i>
                                    </div>

                                    <div class="flex-grow-1 ms-lg-3">
                                        <span class="d-block fs-6">Avg. session duration</span>
                                        <div class="d--flex align-items-center">
                                            <h3 class="mb-0">1m 3s</h3>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Stats -->
                            </div>

                            <div class="col-sm-3">
                                <!-- Stats -->
                                <div class="d-lg-flex align-items-md-center">
                                    <div class="flex-shrink-0">
                                        <i class="bi-files-alt fs-1 text-primary"></i>
                                    </div>

                                    <div class="flex-grow-1 ms-lg-3">
                                        <span class="d-block fs-6">Pages/Sessions</span>
                                        <div class="d--flex align-items-center">
                                            <h3 class="mb-0">1.78</h3>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Stats -->
                            </div>

                            <div class="col-sm-3">
                                <!-- Stats -->
                                <div class="d-lg-flex align-items-md-center">
                                    <div class="flex-shrink-0">
                                        <i class="bi-pie-chart fs-1 text-primary"></i>
                                    </div>

                                    <div class="flex-grow-1 ms-lg-3">
                                        <span class="d-block fs-6">Bounce rate</span>
                                        <div class="d--flex align-items-center">
                                            <h3 class="mb-0">62.9%</h3>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Stats -->
                            </div>
                        </div>
                        <!-- End Row -->
                    </div>
                    <!-- End Body -->

                    <!-- Vector Map -->
                    <div class="jsvectormap-custom-wrapper">
                        <div class="js-jsvectormap jsvectormap-custom"
                            data-hs-js-vector-map-options='{
                              "focusOn": {
                                    "coords": [25, 12],
                                    "scale": 1.5,
                                    "animate": true
                                },
                              "regionStyle": {
                                "initial": {
                                  "fill": "rgba(55, 125, 255, .3)"
                                },
                                "hover": {
                                  "fill": "#377dff"
                                }
                              },
                              "markerStyle": {
                                "initial": {
                                  "stroke-width": 2,
                                  "fill": "rgba(255,255,255,.5)",
                                  "stroke": "rgba(255,255,255,.5)",
                                  "r": 6
                                },
                                "hover": {
                                  "fill": "#fff",
                                  "stroke": "#fff"
                                }
                              }
                                            }'>
                        </div>
                    </div>
                    <!-- End Vector Map -->
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
@endsection

@section('scrip-vendor')
    {{-- <script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/plugins/chartjs/js/Chart.min.js"></script>
    <script src="assets/plugins/chartjs/js/Chart.extension.js"></script>
    <script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script> --}}
    <script src="{{ asset('assets/vendor/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js') }}"></script>
@endsection

@section('javascript')
    <!-- JS Plugins Init. -->
    <script>
        $(document).on('ready', function() {
            // INITIALIZATION OF DATERANGEPICKER
            // =======================================================
            $('.js-daterangepicker').daterangepicker();

            $('.js-daterangepicker-times').daterangepicker({
                timePicker: true,
                startDate: moment().startOf('hour'),
                endDate: moment().startOf('hour').add(32, 'hour'),
                locale: {
                    format: 'M/DD hh:mm A'
                }
            });

            var start = moment();
            var end = moment();

            function cb(start, end) {
                $('#js-daterangepicker-predefined .js-daterangepicker-predefined-preview').html(start.format(
                    'MMM D') + ' - ' + end.format('MMM D, YYYY'));
            }

            $('#js-daterangepicker-predefined').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf('month')]
                }
            }, cb);

            cb(start, end);
        });


        // INITIALIZATION OF DATATABLES
        // =======================================================
        HSCore.components.HSDatatables.init($('#datatable'), {
            select: {
                style: 'multi',
                selector: 'td:first-child input[type="checkbox"]',
                classMap: {
                    checkAll: '#datatableCheckAll',
                    counter: '#datatableCounter',
                    counterInfo: '#datatableCounterInfo'
                }
            },
            language: {
                zeroRecords: `<div class="text-center p-4">
              <img class="mb-3" src="./assets/svg/illustrations/oc-error.svg" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="default">
              <img class="mb-3" src="./assets/svg/illustrations-light/oc-error.svg" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="dark">
            <p class="mb-0">No data to show</p>
            </div>`
            }
        });

        const datatable = HSCore.components.HSDatatables.getItem(0)

        document.querySelectorAll('.js-datatable-filter').forEach(function(item) {
            item.addEventListener('change', function(e) {
                const elVal = e.target.value,
                    targetColumnIndex = e.target.getAttribute('data-target-column-index'),
                    targetTable = e.target.getAttribute('data-target-table');

                HSCore.components.HSDatatables.getItem(targetTable).column(targetColumnIndex).search(
                    elVal !== 'null' ? elVal : '').draw()
            })
        })
    </script>

    <script>
        // INITIALIZATION OF CHARTJS
        // =======================================================
        HSCore.components.HSChartJS.init('.js-chart')


        // INITIALIZATION OF CHARTJS
        // =======================================================
        // HSCore.components.HSChartJS.init('#updatingBarChart')
        // const updatingBarChart = HSCore.components.HSChartJS.getItem('updatingBarChart')

        // // Call when tab is clicked
        // document.querySelectorAll('[data-bs-toggle="chart-bar"]').forEach(item => {
        //     item.addEventListener('click', e => {
        //         let keyDataset = e.currentTarget.getAttribute('data-datasets')

        //         const styles = HSCore.components.HSChartJS.getTheme('updatingBarChart',
        //             HSThemeAppearance.getAppearance())

        //         if (keyDataset === 'lastWeek') {
        //             updatingBarChart.data.labels = [
        //                 "Apr 22", "Apr 23", "Apr 24", "Apr 25",
        //                 "Apr 26", "Apr 27", "Apr 28", "Apr 29", "Apr 30", "Apr 31"
        //             ];
        //             updatingBarChart.data.datasets = [{
        //                     "data": [120, 250, 300, 200, 300, 290, 350, 100, 125, 320],
        //                     "backgroundColor": styles.data.datasets[0].backgroundColor,
        //                     "hoverBackgroundColor": styles.data.datasets[0].hoverBackgroundColor,
        //                     "borderColor": styles.data.datasets[0].borderColor,
        //                     "maxBarThickness": 10
        //                 },
        //                 {
        //                     "data": [250, 130, 322, 144, 129, 300, 260, 120, 260, 245, 110],
        //                     "backgroundColor": styles.data.datasets[1].backgroundColor,
        //                     "borderColor": styles.data.datasets[1].borderColor,
        //                     "maxBarThickness": 10
        //                 }
        //             ];
        //             updatingBarChart.update();
        //         } else {
        //             updatingBarChart.data.labels = [
        //                 "May 1", "May 2", "May 3", "May 4",
        //                 "May 5", "May 6", "May 7", "May 8", "May 9", "May 10"
        //             ];
        //             updatingBarChart.data.datasets = [{
        //                     "data": [200, 300, 290, 350, 150, 350, 300, 100, 125, 220],
        //                     "backgroundColor": styles.data.datasets[0].backgroundColor,
        //                     "hoverBackgroundColor": styles.data.datasets[0]
        //                         .hoverBackgroundColor,
        //                     "borderColor": styles.data.datasets[0].borderColor,
        //                     "maxBarThickness": 10
        //                 },
        //                 {
        //                     "data": [150, 230, 382, 204, 169, 290, 300, 100, 300, 225,
        //                         120
        //                     ],
        //                     "backgroundColor": styles.data.datasets[1].backgroundColor,
        //                     "borderColor": styles.data.datasets[1].borderColor,
        //                     "maxBarThickness": 10
        //                 }
        //             ]
        //             updatingBarChart.update();
        //         }
        //     })
        // })


        // INITIALIZATION OF CHARTJS
        // =======================================================
        HSCore.components.HSChartJS.init('.js-chart-datalabels', {
            plugins: [ChartDataLabels],
            options: {
                plugins: {
                    datalabels: {
                        anchor: function(context) {
                            var value = context.dataset.data[context.dataIndex];
                            return value.r < 20 ? 'end' : 'center';
                        },
                        align: function(context) {
                            var
                                value = context.dataset.data[context.dataIndex];
                            return value.r < 20 ? 'end' : 'center';
                        },
                        color: function(context) {
                            var value = context.dataset.data[context.dataIndex];
                            return value.r < 20 ? context.dataset.backgroundColor : context
                                .dataset.color;
                        },
                        font: function(context) {
                            var value = context.dataset.data[context.dataIndex],
                                fontSize = 25;
                            if (value.r > 50) {
                                fontSize = 35;
                            }

                            if (value.r > 70) {
                                fontSize = 55;
                            }

                            return {
                                weight: 'lighter',
                                size: fontSize
                            };
                        },
                        formatter: function(value) {
                            return value.r
                        },
                        offset: 2,
                        padding: 0
                    }
                },
            }
        })

        // INITIALIZATION OF CLIPBOARD
        // =======================================================
        HSCore.components.HSClipboard.init('.js-clipboard')

        // [
        //     [18, 51, 60, 38, 88, 50, 40, 52, 88, 80, 60, 70],
        //     [27, 38, 60, 77, 40, 50, 49, 29, 42, 27, 42, 50],
        //     [27, 38, 60, 78, 40, 50, 49, 29, 49, 27, 42, 50],
        // ],
        // [
        //     [77, 40, 50, 49, 27, 38, 60, 42, 50, 29, 42, 27],
        //     [60, 38, 18, 51, 88, 50, 40, 52, 60, 70, 88, 80],
        //     [60, 38, 18, 51, 88, 50, 40, 52, 60, 70, 88, 80],
        // ],
        // INITIALIZATION OF CHARTJS
        // =======================================================
        var updatingChartDatasets = [
            [
                @foreach ($projectStatuts as $key => $statut)
                {{ $projectMainChartData[$key] }},
                @endforeach
            ]
        ]


        // INITIALIZATION OF CHARTJS
        // =======================================================
        HSCore.components.HSChartJS.init(document.querySelector('#updatingLineChart'), {
            data: {
                datasets: [{
                        data: updatingChartDatasets[0][0]
                    },
                    {
                        data: updatingChartDatasets[0][1]
                    },
                    {
                        data: updatingChartDatasets[0][2]
                    }
                ]
            }
        })

        const updatingLineChart = HSCore.components.HSChartJS.getItem(0)

        // Call when tab is clicked
        document.querySelectorAll('[data-bs-toggle="chart"]')
            .forEach($item => {
                $item.addEventListener('click', e => {
                    let keyDataset = e.currentTarget.getAttribute('data-datasets')

                    // Update datasets for chart
                    updatingLineChart.data.datasets.forEach((dataset, key) => {
                        dataset.data = updatingChartDatasets[keyDataset][key];
                    });
                    updatingLineChart.update();
                })
            })


        // INITIALIZATION OF CHARTJS
        // =======================================================
        HSCore.components.HSChartJS.init(document.querySelector('.js-chartjs-doughnut-half'), {
            options: {
                plugins: {
                    tooltip: {
                        postfix: "%"
                    }
                },
                cutout: '85%',
                rotation: '270',
                circumference: '180'
            }
        });


        // INITIALIZATION OF VECTOR MAP
        // =======================================================
        const markers = [{
                "coords": [38, -97],
                "name": "United States",
                "active": 200,
                "new": 40,
                "flag": "./assets/vendor/flag-icon-css/flags/1x1/us.svg",
                "code": "US"
            },
            {
                "coords": [20, 77],
                "name": "India",
                "active": 300,
                "new": 100,
                "flag": "./assets/vendor/flag-icon-css/flags/1x1/in.svg",
                "code": "IN"
            },
            {
                "coords": [60, -105],
                "name": "Canada",
                "active": 400,
                "new": 500,
                "flag": "./assets/vendor/flag-icon-css/flags/1x1/ca.svg",
                "code": "CA"
            },
            {
                "coords": [51, 9],
                "name": "Germany",
                "active": 120,
                "new": 600,
                "flag": "./assets/vendor/flag-icon-css/flags/1x1/de.svg",
                "code": "DE"
            },
            {
                "coords": [54, -2],
                "name": "United Kingdom",
                "active": 140,
                "new": 100,
                "flag": "./assets/vendor/flag-icon-css/flags/1x1/gb.svg",
                "code": "GB"
            },
            {
                "coords": [1.3, 103.8],
                "name": "Singapore",
                "active": 56,
                "new": 0,
                "flag": "./assets/vendor/flag-icon-css/flags/1x1/sg.svg",
                "code": "SG"
            },
            {
                "coords": [9.0, 8.6],
                "name": "Nigeria",
                "active": 34,
                "new": 2,
                "flag": "./assets/vendor/flag-icon-css/flags/1x1/ng.svg",
                "code": "NG"
            },
            {
                "coords": [61.5, 105.3],
                "name": "Russia",
                "active": 135,
                "new": 46,
                "flag": "./assets/vendor/flag-icon-css/flags/1x1/ru.svg",
                "code": "RU"
            },
            {
                "coords": [35.8, 104.1],
                "name": "China",
                "active": 325,
                "new": 75,
                "flag": "./assets/vendor/flag-icon-css/flags/1x1/cn.svg",
                "code": "CN"
            },
            {
                "coords": [-10, -51],
                "name": "Brazil",
                "active": 242,
                "new": 17,
                "flag": "./assets/vendor/flag-icon-css/flags/1x1/br.svg",
                "code": "BR"
            }
        ];
        const tooltipTemplate = function(marker) {
            return `
                        <span class="d-flex align-items-center mb-2">
                            <img class="avatar avatar-xss avatar-circle" src="${marker.flag}" alt="Flag">
                            <span class="h5 ms-2 mb-0">${marker.name}</span>
                        </span>
                        <div class="d-flex justify-content-between" style="max-width: 10rem;">
                            <strong>Active:</strong>
                            <span class="ms-2">${marker.active}</span>
                        </div>
                        <div class="d-flex justify-content-between" style="max-width: 10rem;">
                            <strong>New:</strong>
                            <span class="ms-2">${marker.new}</span>
                        </div>
                    `;
        };

        HSCore.components.HSJsVectorMap.init('.js-jsvectormap', {
            markers,
            onRegionTooltipShow(map, tooltip, code) {
                let marker = markers.find(function(marker) {
                    return marker.code === code;
                });

                if (marker) {
                    tooltip._tooltip.style.display = null;
                    tooltip._tooltip.innerHTML = tooltipTemplate(marker);
                } else {
                    tooltip._tooltip.style.display = 'none';
                }
            },
            onMarkerTooltipShow: function(map, tooltip, code) {
                tooltip._tooltip.style.display = null;
                tooltip._tooltip.innerHTML = tooltipTemplate(markers[code]);
            },
            backgroundColor: HSThemeAppearance.getAppearance() === 'dark' ? '#25282a' : '#132144'
        })

        // const vectorMap = HSCore.components.HSJsVectorMap.getItem(0)

        // window.addEventListener('on-hs-appearance-change', e => {
        //   vectorMap.setBackgroundColor(e.detail === 'dark' ? '#25282a' : '#132144')
        // })
    </script>
    <!-- JS Plugins Init. -->
    {{-- <script>
        (function() {
            localStorage.removeItem('hs_theme')

            window.onload = function() {



            }
        })()
    </script> --}}
@endsection
