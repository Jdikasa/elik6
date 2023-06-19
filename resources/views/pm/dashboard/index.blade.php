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

                    {{-- <div class="col-auto">
                        <!-- Daterangepicker -->
                        <button id="js-daterangepicker-predefined" class="btn btn-ghost-light btn-sm dropdown-toggle">
                            <i class="bi-calendar-week"></i>
                            <span class="js-daterangepicker-predefined-preview ms-1"></span>
                        </button>
                        <!-- End Daterangepicker -->
                    </div> --}}
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
            <!-- End Page Header -->
        </div>
    </div>

    <div class="pt-0 content container-fluid" style="margin-top: -17rem;">
        <!-- Stats -->
        <div class="mb-3 row g-3">
            <div class="col-sm-6 col-lg-3">
                <!-- Card -->
                <a class="card card-hover-shadow h-100" href="#">
                    <div class="card-body">
                        <h6 class="card-subtitle">Nombre Total de Clients</h6>

                        <div class="mb-1 row align-items-center gx-2">
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

                        <div class="mb-1 row align-items-center gx-2">
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

                        <div class="mb-1 row align-items-center gx-2">
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

                        <div class="mb-1 row align-items-center gx-2">
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

        <div class="mb-3 row g-3">
            <div class="col-12">
                <div class="card">
                    <!-- Header -->
                    {{-- <div class="card-header card-header-content-sm-between">
                        <h4 class="mb-2 card-header-title mb-sm-0">Projets du mois</h4>

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
                        <div class="mb-4 row align-items-sm-center">
                            <div class="mb-3 col-sm mb-sm-0">
                                <div class="flex-col d-flex align-items-cente">
                                    <span class="mb-3 h5 d-block">Statistique des projets par étape</span>
                                    <span class="mb-1 h1 d-block">Total</span>
                                    <span class="mb-0 h4">{{ convertUnit($totalProjects) }} Projets</span>

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
                                            @for ($i = 1; $i < 13; $i++) "{{ Str::ucfirst(now()->month($i)->isoFormat('MMM')) }}"
                                                @if ($i < 12)
                                                ,
                                                @endif @endfor
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
                                                @endif @endforeach
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
                        <table class="table table-borderless table-thead-bordered table-align-middle card-table"
                            id="datatable">
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
                                                @if (File::exists(public_path(
                                                            '/assets/vendor/flag-icon-css/flags/1x1/' . Str::lower($project->certificat->country->code) . '.svg')))
                                                    <div class="flex-shrink-0">
                                                        <img class="avatar avatar-sm"
                                                            src="{{ asset('assets/vendor/flag-icon-css/flags/1x1/' . Str::lower($project->certificat->country->code) . '.svg') }}"
                                                            alt="Image Description">
                                                    </div>
                                                @else
                                                    <div
                                                        class="avatar @if ($random == 1) avatar-soft-primary @elseif($random == 2) avatar-soft-dark @elseif($random == 3) avatar-soft-info @else avatar-soft-danger @endif  avatar-circle">
                                                        <span class="avatar-initials">
                                                            {{ Str::upper($certificat->country->name_fr[0]) }}
                                                        </span>
                                                    </div>
                                                @endif
                                                <div class="flex-grow-1 ms-3">
                                                    <span class="mb-0 d-block h5 text-inherit">
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
                                                <span class="p-1 badge bg-soft-danger text-danger ms-2">
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
                                                    $pourc = round(($etape * $projectStatuts->count()) / 100, 2);
                                                @endphp
                                                <span class="mb-0 me-2">{{ $pourc }}%</span>
                                                <div class="progress table-progress">
                                                    <div @class(['progress-bar', 'bg-success' => $pourc == 100]) role="progressbar"
                                                        style="width: {{ $pourc }}%"
                                                        aria-valuenow="{{ $pourc }}" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- End Table -->

                    @if (count($projects))
                        <!-- Card Footer -->
                        <a class="text-center card-footer" href="{{ route('pm.projects.index') }}">
                            Voir tout les projets <i class="bi-chevron-right"></i>
                        </a>
                        <!-- End Card Footer -->
                    @endif
                </div>
            </div>
        </div>
        <!-- End Row -->

        <div class="mb-3 row g-3">

            <div class="mb-3 col-lg-6 mb-lg-0">
                <!-- Card -->
                <div class="card h-100">
                    <!-- Header -->
                    <div class="card-header card-header-content-sm-between">
                        <h4 class="mb-2 card-header-title mb-sm-0">Transactions pour ce mois</h4>

                        <!-- Daterangepicker -->
                        {{-- <button id="js-daterangepicker-predefined" class="btn btn-ghost-secondary btn-sm dropdown-toggle">
                            <i class="bi-calendar-week"></i>
                            <span class="js-daterangepicker-predefined-preview ms-1"></span>
                        </button> --}}
                        <!-- End Daterangepicker -->
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        @php
                            $colors = [];
                            $red = [];
                            $green = [];
                            $blue = [];
                            foreach ($transactionChartData2 as $key => $statut) {
                                $hexa = Str::padLeft(dechex(mt_rand(0, 0xffffff)), 6, '0');
                                $colors[$key] = '#' . $hexa;
                                $red[$key] = hexdec(substr($hexa, 0, 2));
                                $green[$key] = hexdec(substr($hexa, 2, 2));
                                $blue[$key] = hexdec(substr($hexa, 4, 6));
                            }
                        @endphp
                        <!-- Chart -->
                        <div class="mx-auto chartjs-custom" style="height: 20rem;">
                            <canvas class="js-chart-datalabels"
                                data-hs-chartjs-options='{
                                    "type": "bubble",
                                    "data": {
                                        "datasets": [
                                            @foreach ($transactionChartData2 as $key => $transaction)
                                                {
                                                    "label": "{{ $transaction->titre }}",
                                                    "data": [
                                                        {"x": {{ $key }}, "y": {{ rand(0, 100) }}, "r": {{ $transaction->transactions_count }}}
                                                    ],
                                                    "color": "#fff",
                                                    "backgroundColor": "rgba({{ $red[$key] }}, {{ $green[$key] }}, {{ $blue[$key] }}, {{ ((rand(1, 5) + 5) * 9) / 100 }})",
                                                    "borderColor": "transparent"
                                                }
                                                @if (!$loop->last)
                                                ,
                                                @endif @endforeach
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
                            @foreach ($transactionChartData2 as $key => $transaction)
                                <div class="col-auto">
                                    <span class="legend-indicator" style="background-color: {{ $colors[$key] }};"></span>
                                    {{ $transaction->titre }}
                                </div>
                            @endforeach
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
                        {{-- <div class="dropdown">
                            <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm rounded-circle"
                                id="reportsOverviewDropdown1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi-three-dots-vertical"></i>
                            </button>

                            <div class="mt-1 dropdown-menu dropdown-menu-end" aria-labelledby="reportsOverviewDropdown1">
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
                        </div> --}}
                        <!-- End Dropdown -->
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        @php
                            $sommeReel = $transactionChartData2
                                ->map(function ($statut) {
                                    return $statut->titre == 'Payée' ? $statut->transactions : null;
                                })
                                ->reject(function ($transaction) {
                                    return $transaction == null;
                                });
                            $sommeReel = $sommeReel->sum('montant');
                            $totalTrans = 0;
                        @endphp
                        <span class="mb-4 h1 d-block">
                            {{ $sommeReel }} USD
                        </span>

                        <!-- Progress -->
                        <div class="mb-2 progress rounded-pill">
                            @foreach ($transactionChartData2 as $key => $statut)
                                @php
                                    $sommeTrans = $statut->tansactions?->sum('montant') ?? 0;
                                    $totalTrans += $sommeTrans;
                                    $pourc = $sommeTrans > 0 ? round(($sommeTrans * 100) / $totalTrans, 0) : 0;
                                @endphp
                                <div class="progress-bar opacity-{{ round((($loop->count - $key) * 100) / count($transactionChartData2), 0) }}"
                                    role="progressbar" style="width: {{ $pourc }}%"
                                    aria-valuenow="{{ $pourc }}" aria-valuemin="0" aria-valuemax="100"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $transaction->titre }}">
                                </div>
                            @endforeach
                        </div>

                        <div class="mb-4 d-flex justify-content-between">
                            <span>0%</span>
                            <span>100%</span>
                        </div>
                        <!-- End Progress -->

                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table mb-0 table-lg table-nowrap card-table">
                                @foreach ($transactionChartData2 as $key => $statut)
                                    @php
                                        $sommeTrans = $statut->tansactions?->sum('montant') ?? 0;
                                        $totalTrans += $sommeTrans;
                                        $pourc = $sommeTrans > 0 ? round(($sommeTrans * 100) / $totalTrans, 0) : 0;
                                    @endphp
                                    <tr>
                                        <th scope="row">
                                            <span
                                                class="legend-indicator bg-primary opacity-{{ round((($loop->count - $key) * 100) / count($transactionChartData2), 0) }}"></span>
                                            {{ $statut->titre }}
                                        </th>
                                        <td>{{ $sommeTrans }}$</td>
                                        <td>
                                            <span @class([
                                                'badge',
                                                'bg-soft-secondary text-secondary' => $statut->id == 1,
                                                'bg-soft-success text-success' => $statut->id == 3,
                                                'bg-soft-warning text-warning' => $statut->id == 2,
                                                'bg-soft-danger text-danger' => $statut->id == 4,
                                            ])>
                                                {{ $pourc }}%
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
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
                <div class="overflow-hidden card">
                    <!-- Header -->
                    <div class="card-header card-header-content-between">
                        <h4 class="card-header-title">Audience</h4>

                        <!-- Dropdown -->
                        {{-- <div class="dropdown">
                            <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm rounded-circle"
                                id="reportsOverviewDropdown2" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi-three-dots-vertical"></i>
                            </button>

                            <div class="mt-1 dropdown-menu dropdown-menu-end" aria-labelledby="reportsOverviewDropdown2">
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
                        </div> --}}
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
                                        <span class="d-block fs-6">
                                            Clients réel
                                            <i class="bi-patch-check-fill text-primary" data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="This report is based on 100% of sessions."></i>
                                        </span>
                                        <div class="d-flex align-items-center">
                                            <h3 class="mb-0">{{ $sumClient['reel'] }}</h3>
                                            <span class="badge bg-soft-success text-success ms-2">
                                                {{-- <i class="bi-graph-up"></i> --}}
                                                12.5%
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
                                        <i class="bi-person fs-1 text-primary"></i>
                                    </div>

                                    <div class="flex-grow-1 ms-lg-3">
                                        <span class="d-block fs-6">
                                            Clients Potentiel
                                            <i class="bi-patch-check text-secondary" data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="This report is based on 100% of sessions."></i>
                                        </span>
                                        <div class="d-flex align-items-center">
                                            <h3 class="mb-0">{{ $sumClient['potentiel'] }}</h3>
                                            <span class="badge bg-soft-success text-success ms-2">
                                                {{-- <i class="bi-graph-up"></i> --}}
                                                12.5%
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
                                        <i class="bi-person fs-1 text-primary"></i>
                                    </div>

                                    <div class="flex-grow-1 ms-lg-3">
                                        <span class="d-block fs-6">
                                            Clients Simple
                                            <i class="bi-patch-check text-warning" data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="This report is based on 100% of sessions."></i>
                                        </span>
                                        <div class="d-flex align-items-center">
                                            <h3 class="mb-0">{{ $sumClient['simple'] }}</h3>
                                            <span class="badge bg-soft-success text-success ms-2">
                                                {{-- <i class="bi-graph-up"></i> --}}
                                                12.5%
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
                                        <i class="bi-globe fs-1 text-primary"></i>
                                    </div>

                                    <div class="flex-grow-1 ms-lg-3">
                                        <span class="d-block fs-6">Pays couvert</span>
                                        <div class="d--flex align-items-center">
                                            <h3 class="mb-0">{{ $clients->count() }}</h3>
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
            dom: "t",
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
                zeroRecords: `<div class="p-4 text-center">
                    <img class="mb-3" src="{{ asset('assets/svg/illustrations/oc-error.svg') }}" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="default">
                    <img class="mb-3" src="{{ asset('assets/svg/illustrations-light/oc-error.svg') }}" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="dark">
                    <p class="mb-0">{{ __('No data to show') }}</p>
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

        // INITIALIZATION OF CHARTJS
        // =======================================================
        var updatingChartDatasets = [
            [
                @foreach ($projectStatuts as $key => $statut)
                    {{ isset($projectMainChartData[$key]) ? $projectMainChartData[$key] : 0 }},
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
        const markers = [
            @foreach ($clients as $client)
                {
                    "coords": {{ $client->coords ?? "[]" }},
                    "name": "{{ $client->name }}",
                    "reel": "{{ $client->reel }}",
                    "simple": "{{ $client->simple }}",
                    "potentiel": "{{ $client->potentiel }}",
                    "flag": "./assets/vendor/flag-icon-css/flags/1x1/{{ Str::lower($client->code) }}.svg",
                    "code": "{{ $client->code }}"
                },
            @endforeach
        ];
        const tooltipTemplate = function(marker) {
            return `
                <span class="mb-2 d-flex align-items-center">
                    <img class="avatar avatar-xss avatar-circle" src="${marker.flag}" alt="Flag">
                    <span class="mb-0 h5 ms-2">${marker.name}</span>
                </span>
                <div class="d-flex justify-content-between" style="max-width: 10rem;">
                    <strong>Réel:</strong>
                    <span class="ms-2">${marker.reel}</span>
                </div>
                <div class="d-flex justify-content-between" style="max-width: 10rem;">
                    <strong>Simple:</strong>
                    <span class="ms-2">${marker.simple}</span>
                </div>
                <div class="d-flex justify-content-between" style="max-width: 10rem;">
                    <strong>Potentiel:</strong>
                    <span class="ms-2">${marker.potentiel}</span>
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
