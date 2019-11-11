FROM datadog/agent:latest

COPY ./conf.d/* /etc/datadog-agent/conf.d/

ENV DD_API_KEY=ca0debc37c552558e2dbf5d4b0fce92f
ENV DD_PROCESS_AGENT_ENABLED=true
ENV DD_TRACE_DEBUG=true
ENV DD_LOGS_ENABLED=true
ENV DD_LOGS_CONFIG_CONTAINER_COLLECT_ALL=true
ENV DD_AC_EXCLUDE="name:datadog-agent"
