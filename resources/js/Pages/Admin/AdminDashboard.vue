<template>
   <div>
       <layout>
            <section id="dashboard-analytics">
                <div v-if="userType == 'superadmin'" class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card  p-1 mb-2 rounded text-center">
                        <div class="card-body d-flex flex-row table-responsive">
                            <inertia-link href="/requisition"><button type="button" class="btn btn-outline-success btn-style btn-sm">Manage Requisitions</button></inertia-link>
                            <inertia-link href="/requisition_analytics"><button type="button" class="btn btn-outline-success btn-style btn-sm ml-2">Requisition Analytics</button></inertia-link>
                            <inertia-link href="/account_statement"><button type="button" class="btn btn-outline-success btn-style btn-sm ml-2">Account Statements</button></inertia-link>
                            <inertia-link href="/staffManager"><button type="button" class="btn btn-outline-success btn-style btn-sm ml-2">Staff Manager</button></inertia-link>
                            <inertia-link href="/Roles-and-Permission"><button type="button" class="btn btn-outline-success btn-style btn-sm ml-2">Roles and Permissions</button></inertia-link>
                            <inertia-link href="/attendance"><button type="button" class="btn btn-outline-success btn-style btn-sm ml-2">Attendance Report</button></inertia-link>
                        </div>
                    </div>
                </div>
                <div class="row match-height">
                    <!-- Greetings Card starts -->
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="card card-congratulations">
                            <div class="card-body text-center">
                                <img src="/app-assets/images/elements/decore-left.png" class="congratulations-img-left" alt="card-img-left">
                                <img src="/app-assets/images/elements/decore-right.png" class="congratulations-img-right" alt="card-img-right">
                                <div class="avatar avatar-xl bg-primary shadow">
                                    <div class="avatar-content">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-award font-large-1"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <h1 class="mb-1 text-white">Welcome, {{userName}}</h1>
                                    <p class="card-text m-auto w-75 mobile">
                                       <inertia-link href="/requisition" style="color:white !important;"> You have <strong>10</strong> new requisitions to process</inertia-link>
                                    </p>
                                    <p  class="card-text m-auto w-75 mobile">
                                        <inertia-link href="/attendance" style="color:white !important;"><strong>View Attendance report page</strong></inertia-link>
                                    </p>
                                    <p class="card-text m-auto w-75 mobile">
                                        <!-- <inertia-link href="/attendance" style="color:white !important;"><strong>15</strong> staff has marked out attendance today</inertia-link> -->
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Greetings Card ends -->
                    <!-- <div  v-for="(total, index) in requisitionTotal" :key="index"> -->
                        <!-- Subscribers Chart Card starts -->
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header flex-column align-items-start pb-0">
                                    <div class="avatar bg-light-primary p-50 m-0">
                                        <div class="avatar-content">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users font-medium-5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                        </div>
                                    </div>
                                    <h3 class="font-weight-bolder mt-1">{{'₦'+forUserTotal.toLocaleString("en-US") + '.00'}}</h3>
                                    <p class="card-text">Total Spent on Staff</p>
                                </div>
                                <div id="gained-chart" style="min-height: 100px;"><div id="apexchartsd934ypji" class="apexcharts-canvas apexchartsd934ypji apexcharts-theme-light" style="width: 278px; height: 100px;"><svg id="SvgjsSvg1006" width="278" height="100" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1008" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs1007"><clipPath id="gridRectMaskd934ypji"><rect id="SvgjsRect1013" width="284.5" height="102.5" x="-3.25" y="-1.25" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="gridRectMarkerMaskd934ypji"><rect id="SvgjsRect1014" width="282" height="104" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><linearGradient id="SvgjsLinearGradient1019" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1020" stop-opacity="0.7" stop-color="rgba(115,103,240,0.7)" offset="0"></stop><stop id="SvgjsStop1021" stop-opacity="0.5" stop-color="rgba(241,240,254,0.5)" offset="0.8"></stop><stop id="SvgjsStop1022" stop-opacity="0.5" stop-color="rgba(241,240,254,0.5)" offset="1"></stop></linearGradient></defs><line id="SvgjsLine1012" x1="0" y1="0" x2="0" y2="100" stroke="#b6b6b6" stroke-dasharray="3" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="100" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG1025" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1026" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g id="SvgjsG1028" class="apexcharts-grid"><g id="SvgjsG1029" class="apexcharts-gridlines-horizontal" style="display: none;"><line id="SvgjsLine1031" x1="0" y1="0" x2="278" y2="0" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1032" x1="0" y1="20" x2="278" y2="20" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1033" x1="0" y1="40" x2="278" y2="40" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1034" x1="0" y1="60" x2="278" y2="60" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1035" x1="0" y1="80" x2="278" y2="80" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1036" x1="0" y1="100" x2="278" y2="100" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line></g><g id="SvgjsG1030" class="apexcharts-gridlines-vertical" style="display: none;"></g><line id="SvgjsLine1038" x1="0" y1="100" x2="278" y2="100" stroke="transparent" stroke-dasharray="0"></line><line id="SvgjsLine1037" x1="0" y1="1" x2="0" y2="100" stroke="transparent" stroke-dasharray="0"></line></g><g id="SvgjsG1015" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG1016" class="apexcharts-series" seriesName="Subscribers" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath1023" d="M0 100L0 77.77777777777777C16.216666666666665 77.77777777777777 30.116666666666664 51.111111111111114 46.33333333333333 51.111111111111114C62.55 51.111111111111114 76.44999999999999 60 92.66666666666666 60C108.88333333333333 60 122.78333333333333 24.444444444444443 139 24.444444444444443C155.21666666666667 24.444444444444443 169.11666666666665 55.55555555555556 185.33333333333331 55.55555555555556C201.54999999999998 55.55555555555556 215.45 6.666666666666657 231.66666666666666 6.666666666666657C247.88333333333333 6.666666666666657 261.7833333333333 17.777777777777786 278 17.777777777777786C278 17.777777777777786 278 17.777777777777786 278 100M278 17.777777777777786C278 17.777777777777786 278 17.777777777777786 278 17.777777777777786 " fill="url(#SvgjsLinearGradient1019)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskd934ypji)" pathTo="M 0 100L 0 77.77777777777777C 16.216666666666665 77.77777777777777 30.116666666666664 51.111111111111114 46.33333333333333 51.111111111111114C 62.55 51.111111111111114 76.44999999999999 60 92.66666666666666 60C 108.88333333333333 60 122.78333333333333 24.444444444444443 139 24.444444444444443C 155.21666666666667 24.444444444444443 169.11666666666665 55.55555555555556 185.33333333333331 55.55555555555556C 201.54999999999998 55.55555555555556 215.45 6.666666666666657 231.66666666666666 6.666666666666657C 247.88333333333333 6.666666666666657 261.7833333333333 17.777777777777786 278 17.777777777777786C 278 17.777777777777786 278 17.777777777777786 278 100M 278 17.777777777777786z" pathFrom="M -1 140L -1 140L 46.33333333333333 140L 92.66666666666666 140L 139 140L 185.33333333333331 140L 231.66666666666666 140L 278 140"></path><path id="SvgjsPath1024" d="M0 77.77777777777777C16.216666666666665 77.77777777777777 30.116666666666664 51.111111111111114 46.33333333333333 51.111111111111114C62.55 51.111111111111114 76.44999999999999 60 92.66666666666666 60C108.88333333333333 60 122.78333333333333 24.444444444444443 139 24.444444444444443C155.21666666666667 24.444444444444443 169.11666666666665 55.55555555555556 185.33333333333331 55.55555555555556C201.54999999999998 55.55555555555556 215.45 6.666666666666657 231.66666666666666 6.666666666666657C247.88333333333333 6.666666666666657 261.7833333333333 17.777777777777786 278 17.777777777777786C278 17.777777777777786 278 17.777777777777786 278 17.777777777777786 " fill="none" fill-opacity="1" stroke="#7367f0" stroke-opacity="1" stroke-linecap="butt" stroke-width="2.5" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskd934ypji)" pathTo="M 0 77.77777777777777C 16.216666666666665 77.77777777777777 30.116666666666664 51.111111111111114 46.33333333333333 51.111111111111114C 62.55 51.111111111111114 76.44999999999999 60 92.66666666666666 60C 108.88333333333333 60 122.78333333333333 24.444444444444443 139 24.444444444444443C 155.21666666666667 24.444444444444443 169.11666666666665 55.55555555555556 185.33333333333331 55.55555555555556C 201.54999999999998 55.55555555555556 215.45 6.666666666666657 231.66666666666666 6.666666666666657C 247.88333333333333 6.666666666666657 261.7833333333333 17.777777777777786 278 17.777777777777786" pathFrom="M -1 140L -1 140L 46.33333333333333 140L 92.66666666666666 140L 139 140L 185.33333333333331 140L 231.66666666666666 140L 278 140"></path><g id="SvgjsG1017" class="apexcharts-series-markers-wrap" data:realIndex="0"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1044" r="0" cx="0" cy="0" class="apexcharts-marker wrkuqy9btk no-pointer-events" stroke="#ffffff" fill="#7367f0" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG1018" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine1039" x1="0" y1="0" x2="278" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1040" x1="0" y1="0" x2="278" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1041" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1042" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1043" class="apexcharts-point-annotations"></g></g><rect id="SvgjsRect1011" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect><g id="SvgjsG1027" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g id="SvgjsG1009" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend" style="max-height: 50px;"></div><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(115, 103, 240);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
                            <div class="resize-triggers"><div class="expand-trigger"><div style="width: 279px; height: 238px;"></div></div><div class="contract-trigger"></div></div></div>
                        </div>
                        <!-- Subscribers Chart Card ends -->

                        <!-- Orders Chart Card starts -->
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header flex-column align-items-start pb-0">
                                    <div class="avatar bg-light-warning p-50 m-0">
                                        <div class="avatar-content">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-package font-medium-5"><line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                                        </div>
                                    </div>
                                    <h3 class="font-weight-bolder mt-1">{{'₦'+ forVendorTotal.toLocaleString("en-US") + '.00'}}</h3>
                                    <p class="card-text">Total Spent on Vendor</p>
                                </div>
                                <div id="order-chart" style="min-height: 100px;"><div id="apexcharts2a4pi7akh" class="apexcharts-canvas apexcharts2a4pi7akh apexcharts-theme-light" style="width: 278px; height: 100px;"><svg id="SvgjsSvg1045" width="278" height="100" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1047" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs1046"><clipPath id="gridRectMask2a4pi7akh"><rect id="SvgjsRect1052" width="284.5" height="102.5" x="-3.25" y="-1.25" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="gridRectMarkerMask2a4pi7akh"><rect id="SvgjsRect1053" width="282" height="104" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><linearGradient id="SvgjsLinearGradient1058" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1059" stop-opacity="0.7" stop-color="rgba(255,159,67,0.7)" offset="0"></stop><stop id="SvgjsStop1060" stop-opacity="0.5" stop-color="rgba(255,245,236,0.5)" offset="0.8"></stop><stop id="SvgjsStop1061" stop-opacity="0.5" stop-color="rgba(255,245,236,0.5)" offset="1"></stop></linearGradient></defs><line id="SvgjsLine1051" x1="0" y1="0" x2="0" y2="100" stroke="#b6b6b6" stroke-dasharray="3" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="100" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG1064" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1065" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g id="SvgjsG1067" class="apexcharts-grid"><g id="SvgjsG1068" class="apexcharts-gridlines-horizontal" style="display: none;"><line id="SvgjsLine1070" x1="0" y1="0" x2="278" y2="0" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1071" x1="0" y1="20" x2="278" y2="20" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1072" x1="0" y1="40" x2="278" y2="40" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1073" x1="0" y1="60" x2="278" y2="60" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1074" x1="0" y1="80" x2="278" y2="80" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1075" x1="0" y1="100" x2="278" y2="100" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line></g><g id="SvgjsG1069" class="apexcharts-gridlines-vertical" style="display: none;"></g><line id="SvgjsLine1077" x1="0" y1="100" x2="278" y2="100" stroke="transparent" stroke-dasharray="0"></line><line id="SvgjsLine1076" x1="0" y1="1" x2="0" y2="100" stroke="transparent" stroke-dasharray="0"></line></g><g id="SvgjsG1054" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG1055" class="apexcharts-series" seriesName="Orders" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath1062" d="M0 100L0 60C16.216666666666665 60 30.116666666666664 10 46.33333333333333 10C62.55 10 76.44999999999999 80 92.66666666666666 80C108.88333333333333 80 122.78333333333333 10 139 10C155.21666666666667 10 169.11666666666665 90 185.33333333333331 90C201.54999999999998 90 215.45 40 231.66666666666666 40C247.88333333333333 40 261.7833333333333 80 278 80C278 80 278 80 278 100M278 80C278 80 278 80 278 80 " fill="url(#SvgjsLinearGradient1058)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask2a4pi7akh)" pathTo="M 0 100L 0 60C 16.216666666666665 60 30.116666666666664 10 46.33333333333333 10C 62.55 10 76.44999999999999 80 92.66666666666666 80C 108.88333333333333 80 122.78333333333333 10 139 10C 155.21666666666667 10 169.11666666666665 90 185.33333333333331 90C 201.54999999999998 90 215.45 40 231.66666666666666 40C 247.88333333333333 40 261.7833333333333 80 278 80C 278 80 278 80 278 100M 278 80z" pathFrom="M -1 160L -1 160L 46.33333333333333 160L 92.66666666666666 160L 139 160L 185.33333333333331 160L 231.66666666666666 160L 278 160"></path><path id="SvgjsPath1063" d="M0 60C16.216666666666665 60 30.116666666666664 10 46.33333333333333 10C62.55 10 76.44999999999999 80 92.66666666666666 80C108.88333333333333 80 122.78333333333333 10 139 10C155.21666666666667 10 169.11666666666665 90 185.33333333333331 90C201.54999999999998 90 215.45 40 231.66666666666666 40C247.88333333333333 40 261.7833333333333 80 278 80C278 80 278 80 278 80 " fill="none" fill-opacity="1" stroke="#ff9f43" stroke-opacity="1" stroke-linecap="butt" stroke-width="2.5" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask2a4pi7akh)" pathTo="M 0 60C 16.216666666666665 60 30.116666666666664 10 46.33333333333333 10C 62.55 10 76.44999999999999 80 92.66666666666666 80C 108.88333333333333 80 122.78333333333333 10 139 10C 155.21666666666667 10 169.11666666666665 90 185.33333333333331 90C 201.54999999999998 90 215.45 40 231.66666666666666 40C 247.88333333333333 40 261.7833333333333 80 278 80" pathFrom="M -1 160L -1 160L 46.33333333333333 160L 92.66666666666666 160L 139 160L 185.33333333333331 160L 231.66666666666666 160L 278 160"></path><g id="SvgjsG1056" class="apexcharts-series-markers-wrap" data:realIndex="0"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1083" r="0" cx="0" cy="0" class="apexcharts-marker ww08cl6v no-pointer-events" stroke="#ffffff" fill="#ff9f43" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG1057" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine1078" x1="0" y1="0" x2="278" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1079" x1="0" y1="0" x2="278" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1080" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1081" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1082" class="apexcharts-point-annotations"></g></g><rect id="SvgjsRect1050" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect><g id="SvgjsG1066" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g id="SvgjsG1048" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend" style="max-height: 50px;"></div><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(255, 159, 67);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
                            <div class="resize-triggers"><div class="expand-trigger"><div style="width: 279px; height: 238px;"></div></div><div class="contract-trigger"></div></div></div>
                        </div>
                        <!-- Orders Chart Card ends -->
                    <!-- </div> -->
                </div>
               
            </section>
        </layout>
   </div>
</template>
<script>
import layout from "../Layouts/Layout.vue"
export default {
    // layout: (h, page) => h(layout, [page]),
    components: {
        layout,
    },
    data(){
        return{
            userName:this.$page.props.auth.user.name,
            userType:this.$page.props.auth.user.type,
            forVendorTotal:'',
            forUserTotal:''
        }
    },
    methods:{
        dashboardTotal() {
                axios.get('get_dashboard_req_total').then(res => {
                this.forVendorTotal = res.data.forVendorTotal;
                this.forUserTotal = res.data.forUserTotal;
                }).catch(err => {
                swal("Cannot fetch Requistions Totals!!!", {
                    icon: "error",
                    });
                })
                // alert('I am working');
        }
       
    },
    mounted() {
        this.dashboardTotal()
    }
}
</script>
<style scoped>
    .match-height{
        height: 20% !important;
    }
    .btn-style{
        border: rgb(158, 255, 96) dotted 2px !important;
        color: rgb(28, 163, 28);
    }
    .btn-style:hover{
        background-color: rgb(158, 255, 96) !important;
        color: white !important;
    }
    @media only screen and ( max-width: 480px) {
        .mobile{
            margin-bottom: 15px !important;
        }
    }
</style>