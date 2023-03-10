USE [master]
GO
/****** Object:  Database [db_PCN]    Script Date: 08/03/2023 14:32:32 ******/
CREATE DATABASE [db_PCN]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'db_PCN', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL14.MSSQLSERVER\MSSQL\DATA\db_PCN.mdf' , SIZE = 73728KB , MAXSIZE = UNLIMITED, FILEGROWTH = 65536KB )
 LOG ON 
( NAME = N'db_PCN_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL14.MSSQLSERVER\MSSQL\DATA\db_PCN_log.ldf' , SIZE = 139264KB , MAXSIZE = 2048GB , FILEGROWTH = 65536KB )
GO
ALTER DATABASE [db_PCN] SET COMPATIBILITY_LEVEL = 140
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [db_PCN].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [db_PCN] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [db_PCN] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [db_PCN] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [db_PCN] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [db_PCN] SET ARITHABORT OFF 
GO
ALTER DATABASE [db_PCN] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [db_PCN] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [db_PCN] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [db_PCN] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [db_PCN] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [db_PCN] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [db_PCN] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [db_PCN] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [db_PCN] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [db_PCN] SET  DISABLE_BROKER 
GO
ALTER DATABASE [db_PCN] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [db_PCN] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [db_PCN] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [db_PCN] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [db_PCN] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [db_PCN] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [db_PCN] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [db_PCN] SET RECOVERY FULL 
GO
ALTER DATABASE [db_PCN] SET  MULTI_USER 
GO
ALTER DATABASE [db_PCN] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [db_PCN] SET DB_CHAINING OFF 
GO
ALTER DATABASE [db_PCN] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [db_PCN] SET TARGET_RECOVERY_TIME = 60 SECONDS 
GO
ALTER DATABASE [db_PCN] SET DELAYED_DURABILITY = DISABLED 
GO
ALTER DATABASE [db_PCN] SET QUERY_STORE = OFF
GO
USE [db_PCN]
GO
/****** Object:  Table [dbo].[tb_application_member]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_application_member](
	[hdrid] [nvarchar](50) NULL,
	[transaction_date] [date] NULL,
	[product] [nvarchar](50) NULL,
	[pe_member_1] [nvarchar](50) NULL,
	[pe_member_2] [nvarchar](50) NULL,
	[pe_member_3] [nvarchar](50) NULL,
	[qc_member_1] [nvarchar](50) NULL,
	[qc_member_2] [nvarchar](50) NULL,
	[qc_member_3] [nvarchar](50) NULL,
	[mfg_member_1] [nvarchar](50) NULL,
	[mfg_member_2] [nvarchar](50) NULL,
	[mfg_member_3] [nvarchar](50) NULL,
	[pc_member_1] [nvarchar](50) NULL,
	[pc_member_2] [nvarchar](50) NULL,
	[pc_member_3] [nvarchar](50) NULL,
	[qa_member_1] [nvarchar](50) NULL,
	[qa_member_2] [nvarchar](50) NULL,
	[qa_member_3] [nvarchar](50) NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Tb_user_login]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Tb_user_login](
	[user_name] [nvarchar](50) NOT NULL,
	[password] [nvarchar](250) NULL,
	[name] [nvarchar](50) NULL,
	[email] [nvarchar](150) NULL,
	[office_email] [nvarchar](150) NULL,
	[kode_department] [nvarchar](50) NULL,
	[department_name] [nvarchar](250) NULL
) ON [PRIMARY]
GO
/****** Object:  UserDefinedFunction [dbo].[fn_view_send_mail_member]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
CREATE FUNCTION [dbo].[fn_view_send_mail_member]
(	
	@product as nvarchar(50)
)
RETURNS TABLE 
AS
RETURN 
(
	-- Add the SELECT statement with parameter references here
	SELECT product,(case when pe_member_1='' or  pe_member_1 is null then '' else (select top 1 office_email from Tb_user_login where user_name=pe_member_1) end)PE_1
	,(case when pe_member_2='' or  pe_member_2 is null then '' else (select top 1 office_email from Tb_user_login where user_name=pe_member_2)+';' end)PE_2
	,(case when pe_member_3='' or  pe_member_3 is null then '' else (select top 1 office_email from Tb_user_login where user_name=pe_member_3)+';' end)PE_3
	,(case when qc_member_1='' or  qc_member_1 is null then '' else (select top 1 office_email from Tb_user_login where user_name=qc_member_1)+';' end)QC_1
	,(case when qc_member_2='' or  qc_member_2 is null then '' else (select top 1 office_email from Tb_user_login where user_name=qc_member_2)+';' end)QC_2
	,(case when qc_member_3='' or  qc_member_3 is null then '' else (select top 1 office_email from Tb_user_login where user_name=qc_member_3)+';' end)QC_3 
	,(case when mfg_member_1='' or  mfg_member_1 is null then '' else (select top 1 office_email from Tb_user_login where user_name=mfg_member_1)+';' end)MFG_1
	,(case when mfg_member_2='' or  mfg_member_2 is null then '' else (select top 1 office_email from Tb_user_login where user_name=mfg_member_2)+';' end)MFG_2
	,(case when mfg_member_3='' or  mfg_member_3 is null then '' else (select top 1 office_email from Tb_user_login where user_name=mfg_member_3)+';' end)MFG_3 
	,(case when pc_member_1='' or  pc_member_1 is null then '' else (select top 1 office_email from Tb_user_login where user_name=pc_member_1)+';' end)PC_1
	,(case when pc_member_2='' or  pc_member_2 is null then '' else (select top 1 office_email from Tb_user_login where user_name=pc_member_2)+';' end)PC_2
	,(case when pc_member_3='' or  pc_member_3 is null then '' else (select top 1 office_email from Tb_user_login where user_name=pc_member_3)+';' end)PC_3 
	,(case when qa_member_1='' or  qa_member_1 is null then '' else (select top 1 office_email from Tb_user_login where user_name=qa_member_1)+';' end)QA_1
	,(case when qa_member_2='' or  qa_member_2 is null then '' else (select top 1 office_email from Tb_user_login where user_name=qa_member_2)+';' end)QA_2
	,(case when qa_member_3='' or  qa_member_3 is null then '' else (select top 1 office_email from Tb_user_login where user_name=qa_member_3)+';' end)QA_3 from tb_application_member where product=@product 

)
GO
/****** Object:  Table [dbo].[tb_application]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_application](
	[hdrid] [nvarchar](50) NULL,
	[transaction_date] [date] NULL,
	[pcn_number] [nvarchar](50) NULL,
	[supplier] [nvarchar](50) NULL,
	[part_number] [nvarchar](50) NULL,
	[part_name] [nvarchar](50) NULL,
	[product_name] [nvarchar](50) NULL,
	[criteria_critical_item] [nvarchar](50) NULL,
	[current_process] [nvarchar](50) NULL,
	[comparison_detail] [nvarchar](50) NULL,
	[qc_inspection_departement] [nvarchar](50) NULL,
	[comment_qc] [nvarchar](50) NULL,
	[hold_or_go_qc] [nvarchar](50) NULL,
	[pe_departement] [nvarchar](50) NULL,
	[comment_pe] [nvarchar](50) NULL,
	[hold_or_go_pe] [nvarchar](50) NULL,
	[mfg_departement] [nvarchar](50) NULL,
	[comment_mfg] [nvarchar](50) NULL,
	[hold_or_go_mfg] [nvarchar](50) NULL,
	[pc_departement] [nvarchar](50) NULL,
	[comment_pc] [nvarchar](50) NULL,
	[hold_or_go_pc] [nvarchar](50) NULL,
	[qa_departement] [nvarchar](50) NULL,
	[comment_qa] [nvarchar](50) NULL,
	[hold_or_go_qa] [nvarchar](50) NULL,
	[status] [nvarchar](50) NULL,
	[confirm_qa] [nvarchar](max) NULL,
	[confirm_qc] [nvarchar](max) NULL,
	[confirm_pe] [nvarchar](max) NULL,
	[confirm_mfg] [nvarchar](max) NULL,
	[confirm_pc] [nvarchar](max) NULL,
	[qc_nik] [nvarchar](50) NULL,
	[pe_nik] [nvarchar](50) NULL,
	[mfg_nik] [nvarchar](50) NULL,
	[pc_nik] [nvarchar](50) NULL,
	[qa_nik] [nvarchar](50) NULL,
	[user_name] [nvarchar](max) NULL,
	[user_nik] [nvarchar](max) NULL,
	[reminder] [date] NULL,
	[qc_name] [nvarchar](50) NULL,
	[pe_name] [nvarchar](50) NULL,
	[mfg_name] [nvarchar](50) NULL,
	[pc_name] [nvarchar](50) NULL,
	[qa_name] [nvarchar](50) NULL
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  UserDefinedFunction [dbo].[fn_view_application]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
CREATE FUNCTION [dbo].[fn_view_application]
(	
	@nik as nvarchar(15)
)
RETURNS TABLE 
AS
RETURN 
(
	-- Add the SELECT statement with parameter references here
	SELECT * from tb_application where status='Open' and (mfg_nik like  + '%' + @nik + '%'  or pe_nik like + '%' + @nik + '%' or qc_nik like + '%' + @nik + '%' or qa_nik like + '%' + @nik + '%' or pc_nik like + '%' + @nik + '%' or user_nik like + '%' + @nik + '%')

)
GO
/****** Object:  Table [dbo].[tb_superiorprocurement]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_superiorprocurement](
	[hdrid] [nvarchar](50) NULL,
	[transaction_date] [date] NULL,
	[nik_superiorprocurement] [nvarchar](50) NULL,
	[name_superiorprocurement] [nvarchar](50) NULL,
	[kode_section_superiorprocurement] [nvarchar](50) NULL,
	[name_section_superiorprocurement] [nvarchar](50) NULL,
	[email_superiorprocurement] [nvarchar](50) NULL,
	[supplier] [nvarchar](50) NULL,
	[position] [nvarchar](50) NULL
) ON [PRIMARY]
GO
/****** Object:  UserDefinedFunction [dbo].[fn_view_send_mail]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
CREATE FUNCTION [dbo].[fn_view_send_mail]
(	
	@pcn_number as nvarchar(20)
)
RETURNS TABLE 
AS
RETURN 
(
	-- Add the SELECT statement with parameter references here
	SELECT qc_inspection_departement,pe_departement,mfg_departement,pc_departement,qa_departement,(select TOP 1 email_superiorprocurement  from tb_superiorprocurement where nik_superiorprocurement=user_nik)creator from fn_view_application('') where pcn_number=@pcn_number 

)
GO
/****** Object:  Table [dbo].[tb_reminder]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_reminder](
	[hdrid] [nvarchar](50) NULL,
	[transaction_date] [date] NULL,
	[reminder_procurement] [nvarchar](50) NULL,
	[reminder_qa] [nvarchar](50) NULL,
	[reminder_application_response] [nvarchar](50) NULL
) ON [PRIMARY]
GO
/****** Object:  UserDefinedFunction [dbo].[fn_reminder_application]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
CREATE FUNCTION [dbo].[fn_reminder_application]
(	
)
RETURNS TABLE 
AS
RETURN 
(
	-- Add the SELECT statement with parameter references here
	SELECT pcn_number,
	(select top 1 email_superiorprocurement from tb_superiorprocurement where nik_superiorprocurement like user_nik)Creator,
	(case when hold_or_go_mfg='' or  hold_or_go_mfg is null then mfg_departement+';' else '' end)MFG  
	,(case when hold_or_go_pc='' or  hold_or_go_pc is null then pc_departement+';' else '' end)PC
	,(case when hold_or_go_qa='' or  hold_or_go_qa is null then qa_departement+';' else '' end)QA
	,(case when hold_or_go_pe='' or  hold_or_go_pe is null then pe_departement+';' else '' end)PE
	,(case when hold_or_go_qc='' or  hold_or_go_qc is null then qc_inspection_departement+';' else '' end)QC
	,(case when hold_or_go_mfg='' or  hold_or_go_mfg is null then mfg_name+',' else '' end)Name0
	,(case when hold_or_go_pc='' or  hold_or_go_pc is null then pc_name+',' else '' end)Name1
	,(case when hold_or_go_qa='' or  hold_or_go_qa is null then qa_name+',' else '' end)Name2
	,(case when hold_or_go_pe='' or  hold_or_go_pe is null then pe_name+',' else '' end)Name3
	,(case when hold_or_go_qc='' or  hold_or_go_qc is null then qc_name else '' end)Name4
	FROM fn_view_application('') where status='Open' and DATEDIFF(day,GETDATE(),reminder)%(select reminder_application_response from tb_reminder)=0
)
GO
/****** Object:  Table [dbo].[tb_PCN]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_PCN](
	[hdrid] [nvarchar](max) NULL,
	[nik] [nvarchar](max) NULL,
	[email] [nvarchar](max) NULL,
	[transaction_date] [date] NULL,
	[supplier_name] [nvarchar](max) NULL,
	[prepared] [nvarchar](max) NULL,
	[checked] [nvarchar](max) NULL,
	[approved] [nvarchar](max) NULL,
	[any_cost_impact] [nvarchar](max) NULL,
	[please_mention] [nvarchar](250) NULL,
	[affect_to_capacity] [nvarchar](50) NULL,
	[cost_impact] [int] NULL,
	[capacity_impact] [nvarchar](max) NULL,
	[before_capacity] [int] NULL,
	[after_capacity] [int] NULL,
	[part_number] [nvarchar](max) NULL,
	[part_name] [nvarchar](max) NULL,
	[product_name] [nvarchar](max) NULL,
	[commodity] [nvarchar](max) NULL,
	[object_type] [nvarchar](max) NULL,
	[reason_to_change] [nvarchar](max) NULL,
	[description_of_process_change] [nvarchar](max) NULL,
	[current_process] [nvarchar](max) NULL,
	[proposed_process] [nvarchar](max) NULL,
	[characteristics_affected] [nvarchar](max) NULL,
	[criteria_critical_item] [nvarchar](max) NULL,
	[trial_manufacturing] [date] NULL,
	[trial_manufacturing_completed_finish] [date] NULL,
	[process_capability_study] [date] NULL,
	[process_capability_study_completed_finish] [date] NULL,
	[initial_sample_inspection_completed] [date] NULL,
	[initial_sample_inspection_completed_finish] [date] NULL,
	[initial_sample_submission] [date] NULL,
	[initial_sample_submission_finish] [date] NULL,
	[timing_denso_approval] [date] NULL,
	[timing_denso_approval_finish] [date] NULL,
	[m_or_p_starts] [date] NULL,
	[mass_production_starts_finish] [date] NULL,
	[m_or_p_shipment] [date] NULL,
	[mass_production_shipment_finish] [date] NULL,
	[entry_example_start] [date] NULL,
	[entry_example_finish] [date] NULL,
	[folder] [nvarchar](max) NULL,
	[stat] [nvarchar](max) NULL,
	[to] [nvarchar](250) NULL,
	[date_anwersheet] [date] NULL,
	[category_for_approve] [nvarchar](50) NULL,
	[go_ahead_or_reject] [nvarchar](250) NULL,
	[process_audit] [nvarchar](250) NULL,
	[date_audit] [date] NULL,
	[initial_product] [nvarchar](250) NULL,
	[sample_duedate] [date] NULL,
	[sample_required] [nvarchar](50) NULL,
	[information_to_customer] [nvarchar](250) NULL,
	[additional_information] [nvarchar](max) NULL,
	[attach_doc1] [nvarchar](max) NULL,
	[attach_doc2] [nvarchar](max) NULL,
	[attach_doc3] [nvarchar](max) NULL,
	[attach_doc4] [nvarchar](max) NULL,
	[attach_doc5] [nvarchar](max) NULL,
	[attach_doc6] [nvarchar](max) NULL,
	[attach_doc7] [nvarchar](max) NULL,
	[attach_doc8] [nvarchar](max) NULL,
	[attach_doc9] [nvarchar](max) NULL,
	[attach_doc10] [nvarchar](max) NULL,
	[attach_doc11] [nvarchar](max) NULL,
	[attach_doc12] [nvarchar](max) NULL,
	[attach_doc13] [nvarchar](max) NULL,
	[attach_doc14] [nvarchar](max) NULL,
	[attach_doc15] [nvarchar](max) NULL,
	[attach_doc16] [nvarchar](max) NULL,
	[attach_doc17] [nvarchar](max) NULL,
	[attach_doc18] [nvarchar](max) NULL,
	[attach_doc19] [nvarchar](max) NULL,
	[attach_doc20] [nvarchar](max) NULL,
	[attach_doc21] [nvarchar](max) NULL,
	[attach_doc22] [nvarchar](max) NULL,
	[attach_doc23] [nvarchar](max) NULL,
	[attach_doc24] [nvarchar](max) NULL,
	[attach_doc25] [nvarchar](max) NULL,
	[attach_doc26] [nvarchar](max) NULL,
	[attach_doc27] [nvarchar](max) NULL,
	[attach_doc28] [nvarchar](max) NULL,
	[attach_doc29] [nvarchar](max) NULL,
	[status_transaction_date_change] [date] NULL,
	[hold_response] [nvarchar](max) NULL
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  UserDefinedFunction [dbo].[fn_view_pcn_register]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
CREATE FUNCTION [dbo].[fn_view_pcn_register]
(	
	@nik as nvarchar(15)
)
RETURNS TABLE 
AS
RETURN 
(
	-- Add the SELECT statement with parameter references here
	SELECT * from tb_pcn where nik  like + '%' + @nik + '%'  
)
GO
/****** Object:  Table [dbo].[tb_isir]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_isir](
	[hdrid] [nvarchar](50) NULL,
	[transaction_date] [date] NULL,
	[no_isir] [nvarchar](50) NULL,
	[isir] [nvarchar](50) NULL,
	[isir_imp] [nvarchar](50) NULL,
	[submit_date] [date] NULL,
	[pic_pro] [nvarchar](50) NULL,
	[qc_result] [nvarchar](50) NULL,
	[qc_submit_date] [date] NULL,
	[pic_qc] [nvarchar](50) NULL,
	[remark] [nvarchar](50) NULL,
	[status] [nvarchar](max) NULL,
	[cc_to1] [nvarchar](50) NULL,
	[cc_to2] [nvarchar](50) NULL,
	[comment] [nvarchar](100) NULL,
	[pro_name] [nvarchar](100) NULL,
	[qc_name] [nvarchar](100) NULL,
	[deviasi] [nvarchar](75) NULL,
	[pro_email] [nvarchar](75) NULL,
	[qc_email] [nvarchar](75) NULL
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  UserDefinedFunction [dbo].[fn_view_isir]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
CREATE FUNCTION [dbo].[fn_view_isir]
(	
	@nik as nvarchar(15)
)
RETURNS TABLE 
AS
RETURN 
(
	-- Add the SELECT statement with parameter references here
	SELECT distinct(hdrid),transaction_date from tb_isir where pic_pro like + '%' + @nik + '%' or pic_qc like + '%' + @nik + '%'

)
GO
/****** Object:  Table [dbo].[tb_approval]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_approval](
	[trxid] [int] IDENTITY(1,1) NOT NULL,
	[transaction_date] [date] NULL,
	[problem_id] [nvarchar](50) NULL,
	[nik] [nvarchar](50) NULL,
	[name] [nvarchar](50) NULL,
	[department_code] [nvarchar](50) NULL,
	[department_name] [nvarchar](150) NULL,
	[office_email] [nvarchar](150) NULL,
	[position_code] [int] NULL,
	[position_name] [nvarchar](50) NULL,
	[date_approve] [smalldatetime] NULL,
	[reason] [nvarchar](250) NULL,
	[stat] [nvarchar](max) NULL
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  UserDefinedFunction [dbo].[fn_reminder_approval]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
CREATE FUNCTION [dbo].[fn_reminder_approval]
(	
)
RETURNS TABLE 
AS
RETURN 
(
	-- Add the SELECT statement with parameter references here
			SELECT a.problem_id hdrid,min(a.position_code)poscode,a.nik,a.name,office_email,b.status_transaction_date_change,DATEDIFF(day,b.status_transaction_date_change,getdate())beda
		FROM tb_approval a
		Inner Join tb_pcn b on a.problem_id = b.hdrid 
		Inner Join tb_application c on a.problem_id = c.pcn_number
		where date_approve is null and b.stat not like 'Rejected%' and DATEDIFF(day,b.status_transaction_date_change,getdate())%(select reminder_procurement from tb_reminder)=0  and c.status like'%Closed%'
		group by a.problem_id,b.status_transaction_date_change,b.stat,a.nik,office_email,a.name
)
GO
/****** Object:  Table [dbo].[a_menu]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[a_menu](
	[hdrid] [nvarchar](50) NULL,
	[menu_id] [nvarchar](50) NULL,
	[menu_name] [varchar](250) NULL,
	[controller] [nvarchar](50) NULL,
	[parentid] [nvarchar](50) NULL,
	[level] [int] NULL,
	[icon] [nvarchar](50) NULL,
	[description] [nvarchar](50) NULL,
	[transaction_date] [date] NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[a_pic_project]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[a_pic_project](
	[hdrid] [nvarchar](50) NULL,
	[transaction_date] [date] NULL,
	[nik] [nvarchar](50) NULL,
	[name] [nvarchar](50) NULL,
	[email_office] [nvarchar](50) NULL,
	[position_code] [nvarchar](50) NULL,
	[position_name] [nvarchar](50) NULL,
	[product_type_code] [nvarchar](50) NULL,
	[product_type] [nvarchar](50) NULL,
	[sequence] [int] NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[a_user_role]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[a_user_role](
	[role_id] [varchar](15) NOT NULL,
	[role_name] [varchar](25) NOT NULL,
	[description] [varchar](100) NULL,
	[transaction_date] [date] NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[a_user_role_access]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[a_user_role_access](
	[hdrid] [nvarchar](50) NOT NULL,
	[role_id] [nvarchar](50) NULL,
	[role_name] [nvarchar](50) NULL,
	[menu_id] [nvarchar](50) NULL,
	[menu_name] [nvarchar](50) NULL,
	[allow_add] [varchar](50) NULL,
	[allow_edit] [varchar](50) NULL,
	[allow_delete] [varchar](50) NULL,
	[allow_import] [varchar](50) NULL,
	[allow_export] [varchar](50) NULL,
	[transaction_date] [date] NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[a_user_system]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[a_user_system](
	[hdrid] [nvarchar](50) NULL,
	[role_id] [nvarchar](50) NULL,
	[role_name] [nvarchar](50) NULL,
	[nik] [nvarchar](50) NULL,
	[username] [nvarchar](50) NULL,
	[transaction_date] [date] NULL,
	[kode_department] [nvarchar](50) NULL,
	[nama_department] [nvarchar](50) NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[dbo.tb.pie_chart_PCN]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[dbo.tb.pie_chart_PCN](
	[hdrid] [nvarchar](50) NULL,
	[transaction_date] [date] NULL,
	[year_ppm_case_target_yearly] [date] NULL,
	[case_target_yearly] [int] NULL,
	[case_actual_yearly] [int] NULL,
	[ppm_target_yearly] [float] NULL,
	[ppm_actual_yearly] [float] NULL,
	[ppm_case_date_yearly] [date] NULL,
	[group_product_id_yearly] [nvarchar](50) NULL,
	[group_product_name_yearly] [nvarchar](50) NULL,
	[quantity_ppm_case_target_yearly] [nvarchar](50) NULL,
	[jenis_yearly] [nvarchar](50) NULL,
	[target_monthly_yearly] [nvarchar](50) NULL,
	[target_yearly_yearly] [nvarchar](50) NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tb_approvalPCN]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_approvalPCN](
	[pcn_number] [varchar](255) NULL,
	[file] [varchar](255) NULL,
	[nik] [varchar](255) NULL,
	[name] [varchar](255) NULL,
	[kode_departement] [varchar](255) NULL,
	[nama_departement] [varchar](255) NULL,
	[approval] [varchar](255) NULL,
	[approved] [date] NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tb_approvalPCN2]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_approvalPCN2](
	[trxid] [int] NOT NULL,
	[pcn_number] [nvarchar](50) NULL,
	[transaction_date] [date] NULL,
	[file] [nvarchar](50) NULL,
	[nik] [nvarchar](50) NULL,
	[name] [nvarchar](50) NULL,
	[department_code] [nvarchar](50) NULL,
	[department_name] [nvarchar](150) NULL,
	[office_email] [nvarchar](150) NULL,
	[position_code] [int] NULL,
	[position_name] [nvarchar](50) NULL,
	[date_approve] [smalldatetime] NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tb_attachment]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_attachment](
	[pcn_number] [varchar](255) NULL,
	[type] [varchar](255) NULL,
	[name] [varchar](255) NULL,
	[url] [varchar](255) NULL,
	[attach_doc1] [nvarchar](max) NULL,
	[attach_doc2] [nvarchar](max) NULL,
	[attach_doc3] [nvarchar](max) NULL,
	[attach_doc4] [nvarchar](max) NULL,
	[attach_doc5] [nvarchar](max) NULL,
	[attach_doc6] [nvarchar](max) NULL,
	[attach_doc7] [nvarchar](max) NULL,
	[attach_doc8] [nvarchar](max) NULL,
	[attach_doc9] [nvarchar](max) NULL,
	[attach_doc10] [nvarchar](max) NULL,
	[attach_doc11] [nvarchar](max) NULL,
	[attach_doc12] [nvarchar](max) NULL,
	[attach_doc13] [nvarchar](max) NULL,
	[attach_doc14] [nvarchar](max) NULL,
	[attach_doc15] [nvarchar](max) NULL,
	[attach_doc16] [nvarchar](max) NULL,
	[attach_doc17] [nvarchar](max) NULL,
	[attach_doc18] [nvarchar](max) NULL,
	[attach_doc19] [nvarchar](max) NULL,
	[attach_doc20] [nvarchar](max) NULL,
	[attach_doc21] [nvarchar](max) NULL,
	[attach_doc22] [nvarchar](max) NULL,
	[attach_doc23] [nvarchar](max) NULL,
	[attach_doc24] [nvarchar](max) NULL,
	[attach_doc25] [nvarchar](max) NULL,
	[attach_doc26] [nvarchar](max) NULL
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tb_coba]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_coba](
	[test] [varchar](255) NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tb_customer_name]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_customer_name](
	[hdrid] [nvarchar](50) NULL,
	[transaction_date] [date] NULL,
	[customer_name] [nvarchar](50) NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Tb_department]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Tb_department](
	[hdrid] [nvarchar](50) NULL,
	[department_code] [nvarchar](50) NULL,
	[department_name] [nvarchar](150) NULL,
	[transaction_date] [date] NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tb_effectiveness]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_effectiveness](
	[hdrid] [nvarchar](50) NULL,
	[transaction_date] [date] NULL,
	[problem_id] [nvarchar](50) NULL,
	[month_1] [date] NULL,
	[comment_1] [nvarchar](50) NULL,
	[attach_file_1] [nvarchar](50) NULL,
	[month_2] [date] NULL,
	[comment_2] [nvarchar](50) NULL,
	[attach_file_2] [nvarchar](50) NULL,
	[month_3] [date] NULL,
	[comment_3] [nvarchar](50) NULL,
	[attach_file_3] [nvarchar](50) NULL,
	[month_4] [date] NULL,
	[comment_4] [nvarchar](50) NULL,
	[attach_file_4] [nvarchar](50) NULL,
	[month_5] [date] NULL,
	[comment_5] [nvarchar](50) NULL,
	[attach_file_5] [nvarchar](50) NULL,
	[month_6] [date] NULL,
	[comment_6] [nvarchar](50) NULL,
	[attach_file_6] [nvarchar](50) NULL,
	[close_report] [nvarchar](50) NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tb_email]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_email](
	[email_id] [nvarchar](max) NULL,
	[created_at] [datetime] NULL
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tb_finalapproval]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_finalapproval](
	[hdrid] [nvarchar](50) NULL,
	[transaction_date] [date] NULL,
	[pcn_number] [nvarchar](50) NULL,
	[supplier_name] [nvarchar](50) NULL,
	[submitall_sign] [nvarchar](50) NULL,
	[part_number] [nvarchar](50) NULL,
	[part_name] [nvarchar](50) NULL,
	[product_name] [nvarchar](50) NULL,
	[criteria_critical_item] [nvarchar](50) NULL,
	[change_affected] [nvarchar](50) NULL,
	[change_affected_2] [nvarchar](50) NULL,
	[change_affected_3] [nvarchar](50) NULL,
	[purch_sec_appvl_sign] [nvarchar](50) NULL,
	[purch_sec_comment_cost_impact_capacity] [nvarchar](50) NULL,
	[reason_change_of_process] [nvarchar](50) NULL,
	[current_process] [nvarchar](50) NULL,
	[proposed_process] [nvarchar](50) NULL,
	[schedule_item_activity] [date] NULL,
	[requirement_document] [nvarchar](50) NULL,
	[control_plan] [nvarchar](50) NULL,
	[supplier_inspection_standard] [nvarchar](50) NULL,
	[fmea] [nvarchar](50) NULL,
	[qa_network] [nvarchar](50) NULL,
	[isir_data_result] [nvarchar](50) NULL,
	[perfomance_data_result] [nvarchar](50) NULL,
	[etc] [nvarchar](50) NULL,
	[other_requirement_column] [nvarchar](50) NULL,
	[digital_final_approval_pcn] [nvarchar](50) NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tb_group_product]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_group_product](
	[hdrid] [nvarchar](50) NULL,
	[transaction_date] [date] NULL,
	[group_product_name] [nvarchar](50) NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tb_input_effectiveness]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_input_effectiveness](
	[hdrid] [nvarchar](50) NULL,
	[transaction_date] [date] NULL,
	[problem_id] [nvarchar](50) NULL,
	[month_1] [date] NULL,
	[comment_1] [nvarchar](225) NULL,
	[attach_file_1] [nvarchar](225) NULL,
	[month_2] [date] NULL,
	[comment_2] [nvarchar](225) NULL,
	[attach_file_2] [nvarchar](225) NULL,
	[month_3] [date] NULL,
	[comment_3] [nvarchar](225) NULL,
	[attach_file_3] [nvarchar](225) NULL,
	[month_4] [date] NULL,
	[comment_4] [nvarchar](225) NULL,
	[attach_file_4] [nvarchar](225) NULL,
	[month_5] [date] NULL,
	[comment_5] [nvarchar](225) NULL,
	[attach_file_5] [nvarchar](225) NULL,
	[month_6] [date] NULL,
	[comment_6] [nvarchar](225) NULL,
	[attach_file_6] [nvarchar](225) NULL,
	[close_report] [nvarchar](225) NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tb_input_problem]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_input_problem](
	[hdrid] [nvarchar](50) NULL,
	[transaction_date] [date] NULL,
	[problem_category_id] [nvarchar](50) NULL,
	[problem_category_name] [nvarchar](50) NULL,
	[group_product_id] [nvarchar](50) NULL,
	[group_product_name] [nvarchar](50) NULL,
	[product_id] [nvarchar](50) NULL,
	[product_name] [nvarchar](50) NULL,
	[customer_id] [nvarchar](50) NULL,
	[customer_name] [nvarchar](50) NULL,
	[contact_person_name] [nvarchar](50) NULL,
	[source_information_id] [nvarchar](50) NULL,
	[source_information_name] [nvarchar](50) NULL,
	[customer_report_number] [nvarchar](50) NULL,
	[part_number] [nvarchar](250) NULL,
	[qty] [nvarchar](50) NULL,
	[lot_number_product] [nvarchar](500) NULL,
	[problem] [nvarchar](225) NULL,
	[detail_problem] [nvarchar](325) NULL,
	[responsible_section] [nvarchar](50) NULL,
	[containment_date] [date] NULL,
	[containment_date_actual] [date] NULL,
	[nik] [nvarchar](50) NULL,
	[name] [nvarchar](50) NULL,
	[section1] [nvarchar](50) NULL,
	[email1] [nvarchar](225) NULL,
	[nik2] [nvarchar](50) NULL,
	[name2] [nvarchar](50) NULL,
	[section2] [nvarchar](50) NULL,
	[email2] [nvarchar](225) NULL,
	[report_date] [date] NULL,
	[report_date_actual] [date] NULL,
	[status] [nvarchar](50) NULL,
	[draft] [nvarchar](50) NULL,
	[problem_name] [nvarchar](50) NULL,
	[rejected_by] [nvarchar](225) NULL,
	[reason] [nvarchar](225) NULL,
	[date_rejected] [date] NULL,
	[due_date] [date] NULL,
	[issue_date] [date] NULL,
	[rank_problem] [nvarchar](50) NULL,
	[attach_picture] [nvarchar](225) NULL,
	[temporary_action] [nvarchar](50) NULL,
	[etc] [nvarchar](225) NULL,
	[delivery_status] [nvarchar](50) NULL,
	[when_problem] [date] NULL,
	[shift_problem] [nvarchar](50) NULL,
	[time_problem] [nvarchar](50) NULL,
	[who_problem] [nvarchar](50) NULL,
	[where_problem] [nvarchar](50) NULL,
	[customer_product_id] [nvarchar](50) NULL,
	[qty_lot] [nvarchar](50) NULL,
	[atachment] [nvarchar](225) NULL,
	[status_transaction] [nvarchar](225) NULL,
	[comment] [nvarchar](250) NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tb_ISIR_information]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_ISIR_information](
	[hdrid] [nvarchar](50) NULL,
	[transaction_date] [date] NULL,
	[process] [nvarchar](50) NULL,
	[submital] [nvarchar](50) NULL,
	[improvement_activity] [nvarchar](50) NULL,
	[supplier_code] [nvarchar](50) NULL,
	[supplier_name] [nvarchar](50) NULL,
	[part_number] [nvarchar](50) NULL,
	[part_name] [nvarchar](50) NULL,
	[tooling_no] [nvarchar](50) NULL,
	[cavity_number] [nvarchar](50) NULL,
	[assy_no] [nvarchar](50) NULL,
	[assy_name] [nvarchar](50) NULL,
	[material_manufacture] [nvarchar](50) NULL,
	[grade_name] [nvarchar](50) NULL,
	[process_name] [nvarchar](50) NULL,
	[sub_supplier_name] [nvarchar](50) NULL,
	[address] [nvarchar](50) NULL,
	[remarks] [nvarchar](50) NULL,
	[inspected_date] [date] NULL,
	[inspector] [nvarchar](50) NULL,
	[manager] [nvarchar](50) NULL,
	[product_adapt_to_dds2004] [nvarchar](50) NULL,
	[imds_id] [nvarchar](50) NULL,
	[millsheet] [nvarchar](50) NULL,
	[rohs_cd] [nvarchar](50) NULL,
	[rohs_hg] [nvarchar](50) NULL,
	[rohs_pb] [nvarchar](50) NULL,
	[rohs_cr] [nvarchar](50) NULL,
	[attach_soc] [nvarchar](50) NULL,
	[dimension_result] [nvarchar](50) NULL,
	[approved] [nvarchar](50) NULL,
	[checked] [nvarchar](50) NULL,
	[prepared] [nvarchar](50) NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tb_isir_list]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_isir_list](
	[hdrid] [nvarchar](50) NULL,
	[transaction_date] [date] NULL,
	[no_isir] [nvarchar](50) NULL,
	[isir] [nvarchar](50) NULL,
	[isir_imp] [nvarchar](50) NULL,
	[submit_date] [smalldatetime] NULL,
	[pic_pro] [nvarchar](50) NULL,
	[qc_result] [nvarchar](50) NULL,
	[qc_submit_date] [smalldatetime] NULL,
	[pic_qc] [nvarchar](50) NULL,
	[remark] [nvarchar](50) NULL,
	[status] [nvarchar](max) NULL,
	[status_isir] [nvarchar](50) NULL
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tb_isir_mail]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_isir_mail](
	[hdrid] [nvarchar](50) NULL,
	[transaction_date] [date] NULL,
	[nik] [nvarchar](50) NULL,
	[name] [nvarchar](50) NULL,
	[email] [nvarchar](50) NULL,
	[section] [nvarchar](50) NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tb_mail_trigger]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_mail_trigger](
	[trxid] [int] NULL,
	[transaction_date] [date] NULL,
	[hdrid] [nvarchar](50) NULL,
	[nik] [nvarchar](50) NULL,
	[name] [nvarchar](150) NULL,
	[department_code] [nvarchar](50) NULL,
	[department_name] [nvarchar](150) NULL,
	[office_email] [nvarchar](150) NULL,
	[position_code] [int] NULL,
	[position_name] [nvarchar](150) NULL,
	[status_transaction] [nvarchar](250) NULL,
	[subject_email] [nvarchar](250) NULL,
	[body_content] [nvarchar](250) NULL,
	[comment] [nvarchar](250) NULL,
	[cc_email] [nvarchar](max) NULL
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tb_NEWPCN]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_NEWPCN](
	[hdrid] [nvarchar](50) NULL,
	[transaction_date] [date] NULL,
	[part_number] [nvarchar](50) NULL,
	[part_name] [nvarchar](50) NULL,
	[nama_supplier] [nvarchar](50) NULL,
	[reason] [nvarchar](50) NULL,
	[approval_supplier] [nvarchar](50) NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tb_PCN1]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_PCN1](
	[hdrid] [nvarchar](50) NULL,
	[transaction_date] [date] NULL,
	[submission_date] [date] NULL,
	[email] [nvarchar](50) NULL,
	[supplier_name] [nvarchar](50) NULL,
	[written_name] [nvarchar](50) NULL,
	[checked_name] [nvarchar](50) NULL,
	[approved_name] [nvarchar](50) NULL,
	[is_there_any_cost_impact] [nvarchar](50) NULL,
	[cost_impact] [nvarchar](50) NULL,
	[is_there_affect_to_capacity] [nvarchar](50) NULL,
	[capacity_before] [nvarchar](50) NULL,
	[capacity_after] [nvarchar](50) NULL,
	[part_no] [nvarchar](50) NULL,
	[part_name] [nvarchar](50) NULL,
	[product_name] [nvarchar](50) NULL,
	[object_type] [nvarchar](50) NULL,
	[reason] [nvarchar](50) NULL,
	[description_of_process_change] [nvarchar](50) NULL,
	[current_condition] [nvarchar](50) NULL,
	[new_condition] [nvarchar](50) NULL,
	[characteristics_affected] [nvarchar](50) NULL,
	[critical_control_item] [nvarchar](50) NULL,
	[supplier] [nvarchar](50) NULL,
	[quality_improvement] [nvarchar](50) NULL,
	[material] [nvarchar](50) NULL,
	[tooling_machine] [nvarchar](50) NULL,
	[trial_manufacturing_completed_start] [date] NULL,
	[trial_manufacturing_completed_finish] [date] NULL,
	[initial_sample_inpection_completed_start] [date] NULL,
	[initial_sample_inpection_completed_finish] [date] NULL,
	[initial_sample_submission_start] [date] NULL,
	[initial_sample_submission_finish] [date] NULL,
	[timing_denso_approval_start] [date] NULL,
	[timing_denso_approval_finish] [date] NULL,
	[mass_productin_starts_start] [date] NULL,
	[mass_productin_starts_finish] [date] NULL,
	[entry_example_start] [date] NULL,
	[entry_example_finish] [date] NULL,
	[requirement_document] [nvarchar](50) NULL,
	[requirement_document_1] [nvarchar](50) NULL,
	[requirement_document_2] [nvarchar](50) NULL,
	[requirement_document_3] [nvarchar](50) NULL,
	[requirement_document_4] [nvarchar](50) NULL,
	[requirement_document_5] [nvarchar](50) NULL,
	[requirement_document_6] [nvarchar](50) NULL,
	[requirement_document_7] [nvarchar](50) NULL,
	[requirement_document_8] [nvarchar](50) NULL,
	[requirement_document_9] [nvarchar](50) NULL,
	[requirement_document_10] [nvarchar](50) NULL,
	[requirement_document_11] [nvarchar](50) NULL,
	[requirement_document_12] [nvarchar](50) NULL,
	[requirement_document_13] [nvarchar](50) NULL,
	[requirement_document_14] [nvarchar](50) NULL,
	[requirement_document_15] [nvarchar](50) NULL,
	[requirement_document_16] [nvarchar](50) NULL,
	[requirement_document_17] [nvarchar](50) NULL,
	[requirement_document_18] [nvarchar](50) NULL,
	[requirement_document_19] [nvarchar](50) NULL,
	[requirement_document_20] [nvarchar](50) NULL,
	[requirement_document_21] [nvarchar](50) NULL,
	[requirement_document_22] [nvarchar](50) NULL,
	[requirement_document_23] [nvarchar](50) NULL,
	[requirement_document_24] [nvarchar](50) NULL,
	[requirement_document_25] [nvarchar](50) NULL,
	[requirement_document_26] [nvarchar](50) NULL,
	[requirement_document_27] [nvarchar](50) NULL,
	[requirement_document_28] [nvarchar](50) NULL,
	[requirement_document_29] [nvarchar](50) NULL,
	[status] [nvarchar](50) NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tb_PCNlist]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_PCNlist](
	[transaction_date] [date] NULL,
	[no_dokumen] [nvarchar](max) NULL,
	[status] [nvarchar](max) NULL,
	[category] [nvarchar](max) NULL,
	[supplier_name] [nvarchar](max) NULL,
	[product_name] [nvarchar](max) NULL,
	[part_name] [nvarchar](max) NULL,
	[part_no] [nvarchar](max) NULL,
	[description] [nvarchar](max) NULL,
	[proses_perubahan_lama] [nvarchar](max) NULL,
	[proses_perubahan_baru] [nvarchar](max) NULL,
	[current_flow_pic] [nvarchar](max) NULL,
	[pic_proc] [nvarchar](max) NULL,
	[checked_proc] [nvarchar](max) NULL,
	[approved_proc] [nvarchar](max) NULL,
	[commodity] [nvarchar](max) NULL,
	[qa_pic] [nvarchar](max) NULL,
	[checked_qa] [nvarchar](max) NULL,
	[approved_qa] [nvarchar](max) NULL,
	[registered] [nvarchar](max) NULL,
	[masspro_schedule] [nvarchar](max) NULL,
	[attachment] [nvarchar](max) NULL,
	[isir] [nvarchar](max) NULL,
	[qcr] [nvarchar](max) NULL,
	[report_pe] [nvarchar](max) NULL,
	[attachment1] [nvarchar](max) NULL,
	[attachment2] [nvarchar](max) NULL,
	[attachment3] [nvarchar](max) NULL,
	[hdrid] [nvarchar](max) NULL
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tb_pic]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_pic](
	[hdrid] [nvarchar](50) NULL,
	[transaction_date] [date] NULL,
	[name] [nvarchar](50) NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tb_position]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_position](
	[position_code] [nvarchar](50) NULL,
	[transaction_date] [date] NULL,
	[position_name] [nvarchar](50) NULL,
	[sequence] [int] NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tb_ppm_case_input]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_ppm_case_input](
	[hdrid] [nvarchar](50) NULL,
	[transaction_date] [date] NULL,
	[year_ppm_case_input] [nvarchar](50) NULL,
	[month_ppm_case_input] [nvarchar](50) NULL,
	[group_product_id] [nvarchar](50) NULL,
	[group_product_name] [nvarchar](50) NULL,
	[quantity_ppm_case_input] [nvarchar](50) NULL,
	[jenis] [nvarchar](50) NULL,
	[ppm_case_date] [date] NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tb_ppm_case_target]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_ppm_case_target](
	[hdrid] [nvarchar](50) NULL,
	[transaction_date] [date] NULL,
	[year_ppm_case_target] [nvarchar](50) NULL,
	[month_ppm_case_target] [nvarchar](50) NULL,
	[case_target] [nvarchar](50) NULL,
	[case_actual] [nvarchar](50) NULL,
	[ppm_target] [float] NULL,
	[ppm_actual] [float] NULL,
	[ppm_case_date] [date] NULL,
	[group_product_id] [nvarchar](50) NULL,
	[group_product_name] [nvarchar](50) NULL,
	[quantity_ppm_case_target] [int] NULL,
	[jenis] [nvarchar](50) NULL,
	[target_monthly] [nvarchar](50) NULL,
	[target_yearly] [nvarchar](50) NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tb_problem_category]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_problem_category](
	[hdrid] [nvarchar](50) NULL,
	[transaction_date] [date] NULL,
	[problem_category_name] [nvarchar](50) NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tb_product]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_product](
	[hdrid] [nvarchar](50) NULL,
	[transaction_date] [date] NULL,
	[product_name] [nvarchar](50) NULL,
	[report_no] [nvarchar](50) NULL,
	[group_product_id] [nvarchar](50) NULL,
	[group_product_name] [nvarchar](50) NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tb_QCR]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_QCR](
	[hdrid] [nvarchar](50) NULL,
	[transaction_date] [date] NULL,
	[reason] [nvarchar](50) NULL,
	[note] [nvarchar](50) NULL,
	[drawing_attached] [nvarchar](50) NULL,
	[qcr_reply] [nvarchar](50) NULL,
	[qcr_issue] [nvarchar](50) NULL,
	[other_attached] [nvarchar](50) NULL,
	[date_reply] [nvarchar](50) NULL,
	[pic_qc] [nvarchar](50) NULL,
	[cc_to1] [nvarchar](50) NULL,
	[cc_to2] [nvarchar](50) NULL,
	[check_point] [nvarchar](50) NULL,
	[judgment] [nvarchar](50) NULL,
	[comment] [nvarchar](50) NULL,
	[nik] [nvarchar](50) NULL,
	[nama] [nvarchar](50) NULL,
	[email] [nvarchar](50) NULL,
	[status] [nvarchar](50) NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tb_QCRLIST]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_QCRLIST](
	[hdrid] [nvarchar](50) NULL,
	[transaction_date] [date] NULL,
	[pcn_number] [nvarchar](50) NULL,
	[supplier] [nvarchar](50) NULL,
	[supplier2] [nvarchar](50) NULL,
	[pcn_number2] [nvarchar](50) NULL,
	[part_number] [nvarchar](50) NULL,
	[product_group] [nvarchar](50) NULL,
	[reason_of_change] [nvarchar](50) NULL,
	[date_of_request] [nvarchar](50) NULL,
	[actual_finish_date] [nvarchar](50) NULL,
	[n5_document_dimension] [nvarchar](50) NULL,
	[n5_document_performance] [nvarchar](50) NULL,
	[capability_data_dimension] [nvarchar](50) NULL,
	[capability_data_perfomance] [nvarchar](50) NULL,
	[air_leak_data] [nvarchar](50) NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tb_response]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_response](
	[hdrid] [nvarchar](50) NULL,
	[transaction_date] [date] NULL,
	[problem_id] [nvarchar](50) NULL,
	[containment_other_action] [nvarchar](500) NULL,
	[attach_file_1_res] [nvarchar](225) NULL,
	[attach_file_2_res] [nvarchar](225) NULL,
	[attach_file_3_res] [nvarchar](225) NULL,
	[nik] [nvarchar](50) NULL,
	[name] [nvarchar](150) NULL,
	[date_response] [date] NULL,
	[status] [nvarchar](50) NULL,
	[dmia_responsible] [nvarchar](500) NULL,
	[occurrence_why_1] [nvarchar](500) NULL,
	[occurrence_prevention_1] [nvarchar](500) NULL,
	[flow_out_why_1] [nvarchar](500) NULL,
	[flow_out_prevention_1] [nvarchar](500) NULL,
	[occurrence_why_2] [nvarchar](500) NULL,
	[occurrence_prevention_2] [nvarchar](500) NULL,
	[flow_out_why_2] [nvarchar](500) NULL,
	[flow_out_prevention_2] [nvarchar](500) NULL,
	[occurrence_why_3] [nvarchar](500) NULL,
	[occurrence_prevention_3] [nvarchar](500) NULL,
	[flow_out_why_3] [nvarchar](225) NULL,
	[flow_out_prevention_3] [nvarchar](225) NULL,
	[occurrence_why_4] [nvarchar](225) NULL,
	[occurrence_prevention_4] [nvarchar](225) NULL,
	[flow_out_why_4] [nvarchar](225) NULL,
	[flow_out_prevention_4] [nvarchar](225) NULL,
	[occurrence_why_5] [nvarchar](225) NULL,
	[occurrence_prevention_5] [nvarchar](225) NULL,
	[flow_out_why_5] [nvarchar](225) NULL,
	[flow_out_prevention_5] [nvarchar](225) NULL,
	[contermeasur_action] [nvarchar](500) NULL,
	[verification] [nvarchar](500) NULL,
	[verification_attach] [nvarchar](50) NULL,
	[implement_actions] [nvarchar](150) NULL,
	[validation_result] [nvarchar](500) NULL,
	[validation_attach] [nvarchar](150) NULL,
	[yokotenkai] [nvarchar](500) NULL,
	[recommendation] [nvarchar](225) NULL,
	[nik_2] [nvarchar](50) NULL,
	[name_2] [nvarchar](150) NULL,
	[date_response_2] [date] NULL,
	[yokotenkai_other_section] [nvarchar](250) NULL,
	[department_name_2] [nvarchar](225) NULL,
	[occurrence_date_1] [date] NULL,
	[occurrence_date_2] [date] NULL,
	[occurrence_date_3] [date] NULL,
	[occurrence_date_4] [date] NULL,
	[occurrence_date_5] [date] NULL,
	[flow_out_date_1] [date] NULL,
	[flow_out_date_2] [date] NULL,
	[flow_out_date_3] [date] NULL,
	[flow_out_date_4] [date] NULL,
	[flow_out_date_5] [date] NULL,
	[normal_condition] [nvarchar](225) NULL,
	[abnormal_condition] [nvarchar](225) NULL,
	[normal_condition_attach_file] [nvarchar](225) NULL,
	[abnormal_condition_attach_file] [nvarchar](225) NULL,
	[received_failed_part] [nvarchar](500) NULL,
	[investigation_activity] [nvarchar](500) NULL,
	[investigation_attach] [nvarchar](150) NULL,
	[attach_file_occurence] [nvarchar](225) NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tb_responsible_section]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_responsible_section](
	[hdrid] [nvarchar](50) NULL,
	[transaction_date] [date] NULL,
	[name] [nvarchar](50) NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tb_role]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_role](
	[role_id] [nvarchar](50) NULL,
	[transaction_date] [date] NULL,
	[role_name] [nvarchar](50) NULL,
	[description] [nvarchar](50) NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tb_section]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_section](
	[hdrid] [nvarchar](50) NULL,
	[transaction_date] [date] NULL,
	[section_code] [nvarchar](50) NULL,
	[section_name] [nvarchar](100) NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tb_setting_approval]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_setting_approval](
	[hdrid] [nvarchar](50) NULL,
	[transaction_date] [date] NULL,
	[group_id] [nvarchar](50) NULL,
	[group_product_name] [nvarchar](50) NULL,
	[problem_category_id] [nvarchar](50) NULL,
	[problem_category_name] [nvarchar](50) NULL,
	[nik] [nvarchar](50) NULL,
	[name] [nvarchar](50) NULL,
	[office_email] [nvarchar](50) NULL,
	[department_code] [nvarchar](50) NULL,
	[department_name] [nvarchar](50) NULL,
	[title] [nvarchar](50) NULL,
	[position_code] [nvarchar](50) NULL,
	[position_name] [nvarchar](50) NULL,
	[product_id] [nvarchar](50) NULL,
	[product_name] [nvarchar](50) NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tb_settingapp]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_settingapp](
	[hdrid] [nvarchar](50) NULL,
	[transaction_date] [date] NULL,
	[product] [nvarchar](50) NULL,
	[pe_nik] [nvarchar](50) NULL,
	[pe_name] [nvarchar](50) NULL,
	[pe_pic] [nvarchar](50) NULL,
	[qc_nik] [nvarchar](50) NULL,
	[qc_name] [nvarchar](50) NULL,
	[qc_pic] [nvarchar](50) NULL,
	[mfg_nik] [nvarchar](50) NULL,
	[mfg_name] [nvarchar](50) NULL,
	[mfg_pic] [nvarchar](50) NULL,
	[pc_nik] [nvarchar](50) NULL,
	[pc_name] [nvarchar](50) NULL,
	[pc_pic] [nvarchar](50) NULL,
	[qa_nik] [nvarchar](50) NULL,
	[qa_name] [nvarchar](50) NULL,
	[qa_pic] [nvarchar](50) NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tb_source_information]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_source_information](
	[hdrid] [nvarchar](50) NULL,
	[transaction_date] [date] NULL,
	[problem] [nvarchar](50) NULL,
	[attach_file] [nvarchar](50) NULL,
	[source_information_name] [nvarchar](50) NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tb_subcontract]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_subcontract](
	[subcontract_number] [int] NULL,
	[isir_number] [int] NULL,
	[subcontract_process] [varchar](255) NULL,
	[subcontract_subcontractor] [varchar](255) NULL,
	[subcontract_Address] [varchar](255) NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tb_superior]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_superior](
	[hdrid] [nvarchar](50) NULL,
	[transaction_date] [date] NULL,
	[nik] [nvarchar](50) NULL,
	[name] [nvarchar](250) NULL,
	[nik_superior] [nvarchar](50) NULL,
	[name_superior] [nvarchar](250) NULL,
	[kode_setion_superior] [nvarchar](50) NULL,
	[name_section_superior] [nvarchar](250) NULL,
	[email_superior] [nvarchar](250) NULL,
	[nik_superior2] [nvarchar](50) NULL,
	[name_superior2] [nvarchar](250) NULL,
	[kode_setion_superior2] [nvarchar](50) NULL,
	[name_section_superior2] [nvarchar](250) NULL,
	[email_superior2] [nvarchar](250) NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tb_superiorqa]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_superiorqa](
	[hdrid] [nvarchar](50) NULL,
	[transaction_date] [date] NULL,
	[nik_superiorqa] [nvarchar](50) NULL,
	[name_superiorqa] [nvarchar](50) NULL,
	[kode_section_superiorqa] [nvarchar](50) NULL,
	[name_section_superiorqa] [nvarchar](50) NULL,
	[email_superiorqa] [nvarchar](50) NULL,
	[product] [nvarchar](50) NULL,
	[position] [nvarchar](50) NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tb_superiorqc]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_superiorqc](
	[hdrid] [nvarchar](50) NULL,
	[transaction_date] [date] NULL,
	[nik_superiorqc] [nvarchar](50) NULL,
	[name_superiorqc] [nvarchar](50) NULL,
	[kode_section_superiorqc] [nvarchar](50) NULL,
	[name_section_superiorqc] [nvarchar](50) NULL,
	[email_superiorqc] [nvarchar](50) NULL,
	[product] [nvarchar](50) NULL,
	[position] [nvarchar](50) NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tb_supplier]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_supplier](
	[hdrid] [nvarchar](50) NULL,
	[transaction_date] [date] NULL,
	[nama_supplier] [nvarchar](50) NULL,
	[nomor_supplier] [nvarchar](50) NULL,
	[part_name] [nvarchar](50) NULL,
	[part_number] [nvarchar](50) NULL,
	[tanggal_transaksi] [date] NULL,
	[reason] [nvarchar](50) NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tb_tooling]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_tooling](
	[pcn_number] [varchar](max) NULL,
	[submission_date] [date] NULL,
	[supplier] [varchar](max) NULL,
	[tipe] [varchar](max) NULL,
	[part_number] [varchar](max) NULL,
	[part_name] [varchar](max) NULL,
	[number_tooling] [varchar](max) NULL,
	[reason] [varchar](max) NULL,
	[planning] [varchar](max) NULL,
	[month_1] [varchar](max) NULL,
	[month_2] [varchar](max) NULL,
	[month_3] [varchar](max) NULL,
	[month_4] [varchar](max) NULL,
	[month_5] [varchar](max) NULL,
	[month_6] [varchar](max) NULL,
	[quantity_month_1] [varchar](max) NULL,
	[quantity_month_2] [varchar](max) NULL,
	[quantity_month_3] [varchar](max) NULL,
	[quantity_month_4] [varchar](max) NULL,
	[quantity_month_5] [varchar](max) NULL,
	[quantity_month_6] [varchar](max) NULL,
	[start_delivery_to_aine] [varchar](max) NULL,
	[current_dies_mold_price] [varchar](max) NULL,
	[current_dies_m_c_tonage] [varchar](max) NULL,
	[current_dies_qty_cavity] [varchar](max) NULL,
	[current_dies_cavity_number] [varchar](max) NULL,
	[current_dies_output_pcs_hour] [varchar](max) NULL,
	[current_dies_guarantee_shoot] [varchar](max) NULL,
	[current_dies_total_shoot] [varchar](max) NULL,
	[new_dies_mold_finish] [varchar](max) NULL,
	[new_dies_mold_price] [varchar](max) NULL,
	[new_dies_m_c_tonage] [varchar](max) NULL,
	[new_dies_qty_cavity] [varchar](max) NULL,
	[new_dies_cavity_number] [varchar](max) NULL,
	[new_dies_type] [varchar](max) NULL,
	[schedule_t0_t1_trial] [varchar](max) NULL,
	[schedule_sample_isir_submission] [varchar](max) NULL,
	[schedule_cycle_time] [varchar](max) NULL,
	[schedule_cavity_number] [varchar](max) NULL,
	[schedule_output_pcs_hour] [varchar](max) NULL,
	[schedule_total_output_month] [varchar](max) NULL
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tb_tooling2]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_tooling2](
	[hdrid] [nvarchar](50) NULL,
	[transaction_date] [date] NULL,
	[vendor_submission] [nvarchar](50) NULL,
	[supplier_name_and_code] [nvarchar](50) NULL,
	[part_number] [nvarchar](50) NULL,
	[assy_for] [nvarchar](50) NULL,
	[part_name] [nvarchar](50) NULL,
	[number_of_tooling] [nvarchar](50) NULL,
	[orderup_or_less_capacity] [nvarchar](50) NULL,
	[cost_down] [nvarchar](50) NULL,
	[quality_problem] [nvarchar](50) NULL,
	[renewal_and_additional] [nvarchar](50) NULL,
	[month] [nvarchar](50) NULL,
	[qty] [nvarchar](50) NULL,
	[start_delivery] [nvarchar](50) NULL,
	[mold_finish] [nvarchar](50) NULL,
	[mold_price] [nvarchar](50) NULL,
	[mold_price_2] [nvarchar](50) NULL,
	[m_or_c_tonage] [nvarchar](50) NULL,
	[m_or_c_tonage_2] [nvarchar](50) NULL,
	[qty_cavity] [nvarchar](50) NULL,
	[qty_cavity_2] [nvarchar](50) NULL,
	[cavity_no] [nvarchar](50) NULL,
	[cavity_no_2] [nvarchar](50) NULL,
	[output] [nvarchar](50) NULL,
	[guarantee_shoot] [nvarchar](50) NULL,
	[gambar] [nvarchar](50) NULL,
	[total_renewal] [nvarchar](50) NULL,
	[change_core] [nvarchar](50) NULL,
	[change_moving_dies] [nvarchar](50) NULL,
	[change_fix_dies] [nvarchar](50) NULL,
	[total_shot] [nvarchar](50) NULL,
	[t0_to_t1_trial] [nvarchar](50) NULL,
	[sample_isir_submission] [nvarchar](50) NULL,
	[cycle_time] [nvarchar](50) NULL,
	[cavity] [nvarchar](50) NULL,
	[output_2] [nvarchar](50) NULL,
	[total_output_pcs_per_month] [nvarchar](50) NULL,
	[approval_submission_of_renewal_mold] [nvarchar](50) NULL,
	[approved] [nvarchar](50) NULL,
	[checked] [nvarchar](50) NULL,
	[prepared] [nvarchar](50) NULL,
	[tooling_no] [nvarchar](50) NULL,
	[tooling_cost] [nvarchar](50) NULL,
	[depresiation_cost] [nvarchar](50) NULL,
	[part_price] [nvarchar](50) NULL,
	[total_cost] [nvarchar](50) NULL,
	[remark] [nvarchar](50) NULL,
	[approval] [nvarchar](50) NULL,
	[life_shoot_guarantee] [nvarchar](50) NULL,
	[forcast_pc_and_nenkei] [nvarchar](50) NULL,
	[quotation] [nvarchar](50) NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tb_useraccess]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_useraccess](
	[transaction_date] [date] NULL,
	[role_id] [nvarchar](50) NULL,
	[role_name] [nvarchar](50) NULL,
	[id_menu] [nvarchar](50) NULL,
	[menu_id] [nvarchar](50) NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tb_usereccs]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_usereccs](
	[hdrid] [nvarchar](50) NULL,
	[transaction_date] [date] NULL,
	[nik] [nvarchar](50) NULL,
	[username] [nvarchar](50) NULL,
	[kode_department] [nvarchar](50) NULL,
	[nama_department] [nvarchar](50) NULL,
	[email] [nvarchar](50) NULL,
	[password] [nvarchar](50) NULL,
	[role_id] [nvarchar](50) NULL,
	[role_name] [nvarchar](50) NULL,
	[status] [nvarchar](50) NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[View_problem]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[View_problem](
	[hdrid] [nvarchar](50) NULL,
	[hdrid2] [nvarchar](50) NULL,
	[product_name] [nvarchar](50) NULL,
	[customer_name] [nvarchar](50) NULL,
	[customer_report_number] [nvarchar](50) NULL,
	[dd] [nvarchar](100) NULL
) ON [PRIMARY]
GO
ALTER TABLE [dbo].[tb_application] ADD  CONSTRAINT [DF_tb_application_status]  DEFAULT (N'Closed') FOR [status]
GO
ALTER TABLE [dbo].[tb_PCNlist] ADD  CONSTRAINT [DF__tb_PCNlis__check__1975C517]  DEFAULT ('Not Yet Approved') FOR [checked_proc]
GO
ALTER TABLE [dbo].[tb_PCNlist] ADD  CONSTRAINT [DF__tb_PCNlis__appro__1A69E950]  DEFAULT ('Not Yet Approved') FOR [approved_proc]
GO
ALTER TABLE [dbo].[tb_PCNlist] ADD  CONSTRAINT [DF__tb_PCNlis__check__1C5231C2]  DEFAULT ('Not Yet Approved') FOR [checked_qa]
GO
ALTER TABLE [dbo].[tb_PCNlist] ADD  CONSTRAINT [DF__tb_PCNlis__appro__1B5E0D89]  DEFAULT ('Not Yet Approved') FOR [approved_qa]
GO
/****** Object:  StoredProcedure [dbo].[sp_reminder_application]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
CREATE PROCEDURE [dbo].[sp_reminder_application]
AS
BEGIN
	-- SET NOCOUNT ON added to prevent extra result sets from
	-- interfering with SELECT statements.
	SET NOCOUNT ON;


	/****** Deklarasi variable spesifikasi body macro ******/
	Declare @pcn_number nvarchar(max),@Creator nvarchar(max),@MFG nvarchar(max),@QA nvarchar(max),@QC nvarchar(max),@PC nvarchar(max),@PE nvarchar(max)
	,@Name0 nvarchar(max),@Name1 nvarchar(max),@Name2 nvarchar(max),@Name3 nvarchar(max),@Name4 nvarchar(max)
	   
	/* Open data yang delay */
	DECLARE Send_Cursor CURSOR FOR select pcn_number,Creator,MFG,QA,QC,PC,PE,Name0,Name1,Name2,Name3,Name4 from fn_reminder_application()
  
    OPEN Send_Cursor 

	FETCH NEXT FROM Send_Cursor Into @pcn_number,@Creator,@MFG,@QA,@QC,@PC,@PE,@Name0,@Name1,@Name2,@Name3,@Name4
	
	/****** Looping data ******/
	WHILE @@FETCH_STATUS = 0
	BEGIN 

	    
		--   /* Update mail_trigger */
			 BEGIN
				UPDATE tb_mail_trigger
				SET	   hdrid = @pcn_number,
					   transaction_date=GETDATE(),
					   nik = '',
					   name = @Name0+@Name1+@Name2+@Name3+@Name4,
					   department_code = '',
					   department_name = '',
					   office_email = @Creator,
					   position_code='',
					   position_name='',
					   status_transaction='',
					   subject_email='Reminder Response',
					   body_content='',
					   comment='',
					   cc_email=@MFG+@QA+@QC+@PC+@PE
				WHERE  trxid = 0
			END 
		                  

	FETCH NEXT FROM Send_Cursor Into @pcn_number,@Creator,@MFG,@QA,@QC,@PC,@PE,@Name0,@Name1,@Name2,@Name3,@Name4
	END

	CLOSE Send_Cursor
	DEALLOCATE Send_Cursor
	
END


GO
/****** Object:  StoredProcedure [dbo].[sp_reminder_approval]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
CREATE PROCEDURE [dbo].[sp_reminder_approval]
AS
BEGIN
	-- SET NOCOUNT ON added to prevent extra result sets from
	-- interfering with SELECT statements.
	SET NOCOUNT ON;


	/****** Deklarasi variable spesifikasi body macro ******/
	Declare @hdrid nvarchar(max),@poscode nvarchar(max),@nik nvarchar(max),@name nvarchar(max),@office_email nvarchar(max)
	/* Open data yang delay */
	DECLARE Send_Cursor CURSOR FOR select hdrid,poscode,nik,name,office_email from fn_reminder_approval()
  
    OPEN Send_Cursor 

	FETCH NEXT FROM Send_Cursor Into @hdrid,@poscode,@nik,@name,@office_email
	
	/****** Looping data ******/
	WHILE @@FETCH_STATUS = 0
	BEGIN 

	    
		--   /* Update mail_trigger */
			 BEGIN
				UPDATE tb_mail_trigger
				SET	   hdrid = @hdrid,
					   transaction_date=GETDATE(),
					   nik = @nik,
					   name = @name,
					   department_code = '',
					   department_name = '',
					   office_email = @office_email,
					   position_code=@poscode,
					   position_name='',
					   status_transaction='',
					   subject_email='Reminder Approve',
					   body_content='',
					   comment='',
					   cc_email=''
				WHERE  trxid = 0
			END 
		                  

	FETCH NEXT FROM Send_Cursor Into @hdrid,@poscode,@nik,@name,@office_email
	END

	CLOSE Send_Cursor
	DEALLOCATE Send_Cursor
	
END


GO
/****** Object:  StoredProcedure [dbo].[sp_send_mail_PCN]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO

CREATE PROCEDURE [dbo].[sp_send_mail_PCN]
	@hdrid nvarchar(max) = NULL,@nik nvarchar(max) = NULL,@name nvarchar(max) = NULL,@email nvarchar(max) = NULL,@EmailSubject nvarchar(max) = NULL,@Email_body_content nvarchar(max) = NULL,@comment nvarchar(max) = NULL,@position_code nvarchar(max) = NULL, @copy_to varchar(max)=null
AS
BEGIN

		/****** Deklarasi variable email ******/
		declare @EmailBody nvarchar(max),@EmailData nvarchar(max),@next nvarchar(max)= ''

		
		/****** Deklarasi variable spesifikasi body macro ******/
			Declare @hdrid_ nvarchar(max), @transaction_date_ nvarchar(max), @supplier_name_ nvarchar(max), @part_name_ nvarchar(max), @part_number_ nvarchar(max),@before_ nvarchar(max),@after_ nvarchar(max),@m_or_p_ nvarchar(max),@stat_ nvarchar(max)

		/** Select data **/
			DECLARE Send_Cursor2 CURSOR FOR Select isnull(hdrid,'')hdrid_,isnull(transaction_date,'')transaction_date_,isnull(supplier_name,'')supplier_name_,isnull(part_name,'')part_name_,isnull(part_number,'')part_number_,isnull(current_process,'')before_,isnull(proposed_process,'')after_,isnull(m_or_p_starts,'')m_or_p_,isnull(stat,'')stat_ from tb_pcn where hdrid=@hdrid
	

		/****** Deklarasi CURSOR untuk data body email ******/

		if (@EmailSubject like 'Rejected%' or @EmailSubject like 'Hold%')
			set @next = 'Please revise your form'
		if (@EmailSubject like 'Need Approve%')
			set @next = 'Please click link below and approve'
		if (@EmailSubject like 'Need Your Response to Application Response%' or @EmailSubject like 'Reminder Response%')
			set @next = 'Please fill your response on Application Response'
		if (@EmailSubject like '%ISIR Need Attach%')
			set @next = 'Please attach your attachment on ISIR'
		if (@EmailSubject like '%ISIR QC Measurement%')
			set @next = 'Please review supplier attach'
		if (@EmailSubject like 'QC Result%')
			set @next = 'Please follow up this PCN'
		if (@EmailSubject like 'ISIR QC Result%')
			set @next = 'Please proceed with QCR'
			
		OPEN Send_Cursor2 

		

			set @EmailBody = '<html>
		<head>		
		</head>
		<body>'
				
		set @EmailSubject = @hdrid + ':' + @EmailSubject
				
	

		set @EmailBody = @EmailBody + 'Dear Mr./Mrs. varname <br />'
	
		set @EmailBody = @EmailBody + @comment + '<br />'

		set @EmailBody = @EmailBody + @Email_body_content + '<br><br />'
		
			FETCH NEXT FROM Send_Cursor2 Into  @hdrid_,@transaction_date_,@supplier_name_,@part_name_,@part_number_,@before_,@after_,@m_or_p_,@stat_

			/****** Looping data ******/
			WHILE @@FETCH_STATUS = 0
			BEGIN
						
			set @EmailData = '<table cellspacing="0" width="50%">'			
			set @EmailData = @EmailData + '<tr><td> Issue Date </td><td> : </td><td>' + @transaction_date_ + '</td></tr>'
										+ '<tr><td> PCN No.	</td><td>: </td><td>' + @hdrid_ + '</td></tr>'
										+ '<tr><td> Supplier Name	</td><td>: </td><td>' + @supplier_name_ + '</td></tr>'
										+ '<tr><td> Part Name	</td><td>: </td><td>' + @part_name_ + '</td></tr>'
										+ '<tr><td> Part Number	</td><td>: </td><td>' + @part_number_ + '</td></tr>'
										+ '<tr><td><b>Detail of Process Change	</b></td></tr>'
										+ '<tr><td> Before	</td><td>: </td><td>' + @before_ + '</td></tr>'
										+ '<tr><td> After	</td><td>: </td><td>' + @after_ + '</td></tr>'
										+ '<tr><td> Timing M/P	</td><td>: </td><td>' + @m_or_p_ + '</td></tr><br><br>'
										+ '<tr><td> Current Status</td><td>: </td><td>' + @stat_ + '</td></tr>'
										+ '<tr><td> Next action to do	</td><td>: </td><td>' + @next
			set @EmailData = @EmailData + '</table><br /><br />'
											
			FETCH NEXT FROM Send_Cursor2 Into @hdrid_,@transaction_date_,@supplier_name_,@part_name_,@part_number_,@before_,@after_,@m_or_p_,@stat_
			END



		--set @EmailData = @EmailData + 'Next Ac'
		set @EmailBody = @EmailBody + @EmailData 
		
		set @EmailBody = @EmailBody + '<b>Please note that you should login into pcn system before click link</b><br><br>'
		
		if (@EmailSubject like '%Approve%')
			set @EmailBody = @EmailBody + '<a href="http://10.73.142.69/PCN/C_Print_approvedDummy/print_report2_approved?var1='+ @hdrid +'" > <b> Click to open the document</b> </a><br><br>'
		--set @EmailBody = @EmailBody + '<a href="http//10.73.142.69/PCN/C_PCNLIST?Number='+ @hdrid +'" > <b> Click to open PCN List</b> </a><br><br>'
		
		
		if (@EmailSubject like '%PCN Complete%')
			set @EmailBody = @EmailBody + '<a href="http://10.73.142.69/PCN/C_Print_approvedDummy/print_report2_approved?var1='+ @hdrid +'" > <b> Click to open the document</b> </a><br><br>'
		

		if (@EmailSubject like '%Need Your Response to Application Response%' or @EmailSubject like '%Reminder Response%' or @EmailSubject like '%Hold%')
		  BEGIN
			set @EmailBody = @EmailBody + '<a href="http://10.73.142.69/PCN/C_Print_approvedDummy/print_report2_approved?var1='+ @hdrid +'" > <b> Click to open A4 PCN</b> </a><br><br>'
			set @EmailBody = @EmailBody + '<a href="http://10.73.142.69/PCN/C_application?Number='+ @hdrid +'" > <b> Click to open form on browser</b> </a>'
		  END

		if (@EmailSubject like '%ISIR%' or @EmailSubject like '%QC Result%')
		  BEGIN
			set @EmailBody = @EmailBody + '<a href="http://10.73.142.69/PCN/C_Print_approvedDummy/print_report2_approved?var1='+ @hdrid +'" > <b> Click to open A4 PCN</b> </a><br><br>'
			set @EmailBody = @EmailBody + '<a href="http://10.73.142.69/PCN/C_ISIR?Number='+ @hdrid +'" > <b> Click to open form on browser</b> </a>'
		  END
		--set @EmailBody = @EmailBody + '<a href="http//10.73.142.69/PCN/C_Print_approvedDummy/print_report2_approved?var1='+ @hdrid +'" > <b> Click to open all your responsible sheet</b> </a>'
		
		--if (left(@EmailSubject,6)='Reject')

			set @EmailBody = @EmailBody + '<br><br><br>		
			The email is automatically send by system.		
			<br><br>
			Kind Regards,
			<br><br><br>
			DMIA System
			<hr>'


		set @EmailBody = @EmailBody + '</body>
		</html>'

				
		if (@EmailSubject like '%Need Approve%' and @position_code >=5 and @position_code <=7)
				set @EmailSubject = @hdrid + ':' + 'Need your Response to Plan Approval'
		if (@EmailSubject like '%Need Approve%' and @position_code >=8)
				set @EmailSubject = @hdrid + ':' + 'Need your Response to Final Approval'

			/******  Replace name to     ******/	
			set @EmailBody = replace(@EmailBody,'varname',@name)
			
			/****** Eksekusi kirim email ******/	
			EXEC msdb.dbo.sp_send_dbmail  
					@profile_name = 'PCN SYSTEM',  
					@recipients = @email,	
					@copy_recipients = @copy_to,
					@subject = @EmailSubject,
					@body_format = 'HTML',
					-- Mematikan output email terkirim/tidak
					@exclude_query_output = 1,
					@body = @EmailBody;

				/****** Next Row Data ******/		
		


	/****** Tutup cursor seletah open ******/
	CLOSE Send_Cursor2
	DEALLOCATE Send_Cursor2

			

END
GO
/****** Object:  StoredProcedure [dbo].[sp_send_mail_supplier]    Script Date: 08/03/2023 14:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO

CREATE PROCEDURE [dbo].[sp_send_mail_supplier]
	@hdrid nvarchar(max) = NULL,@nik nvarchar(max) = NULL,@name nvarchar(max) = NULL,@email nvarchar(max) = NULL,@EmailSubject nvarchar(max) = NULL,@Email_body_content nvarchar(max) = NULL,@comment nvarchar(max) = NULL,@position_code nvarchar(max) = NULL
AS
BEGIN

    /****** Deklarasi variable ******/
	declare @Send_NoPegawai nvarchar(10),@Send_email_type int,@Send_Nama nvarchar(100),@Send_email nvarchar(50)
	declare @EmailBody nvarchar(max),@EmailBody2 nvarchar(max),@EmailData nvarchar(max)
	declare @copy_to varchar(max)=''
		
	/****** Deklarasi variable spesifikasi body ******/
	Declare @nama_supplier nvarchar(max),@nomor_supplier nvarchar(max),@part_name nvarchar(max),@part_number nvarchar(max),@tanggal_transaksi nvarchar(max),@reason nvarchar(max)

	/****** Deklarasi CURSOR untuk data problem ******/
	DECLARE Send_Cursor CURSOR FOR		
Select nama_supplier,nomor_supplier,part_name,part_number,tanggal_transaksi,reason from tb_supplier where hdrid=@hdrid

	/****** Open CURSOR ******/
	OPEN Send_Cursor 


	/****** First Row Data ******/
	FETCH NEXT FROM Send_Cursor 			
	/*Into @ecr_id,@product_id,@product_type*/
	Into @nama_supplier,@nomor_supplier,@part_name,@part_number,@tanggal_transaksi,@reason


	/****** Looping data ******/
	WHILE @@FETCH_STATUS = 0
	BEGIN
		set @EmailBody = '<html>
		<head>	
		</head>
		<body>'
				
		set @EmailSubject = @EmailSubject + ':' + @hdrid		
		set @EmailBody = @EmailBody + 'Dear Mr./Mrs. varname, <br /><br />'
		set @EmailBody = @EmailBody + @Email_body_content + '<br>'
		set @EmailBody = @EmailBody + @comment + '<br>'
		
		set @EmailData = '<table cellspacing="0" width="100%">'

		/* Email data Row */
		set @EmailData = @EmailData + '	
		<tr><th width="150">nama supplier</th>
		<th width="150">nomor supplier</th>
		<th width="150">part name</th>
		<th width="150">part number</th>
		<th width="150">tanggal transaksi</th>
		<th width="150">reason</th></tr>
		'
		
		/* Email data Row */
		set @EmailData = @EmailData + '		
		<tr><td width="150">'+@nama_supplier+'</td>
		<td width="150">'+@nomor_supplier+'</td>
		<td width="150">'+@part_name+'</td>
		<td width="150">'+@part_number+'</td>
		<td width="150">'+@tanggal_transaksi+'</td>
		<td width="150">'+@reason+'</td></tr>

		     '

		set @EmailData = @EmailData + '</table>'
		set @EmailBody = @EmailBody + @EmailData 
		
		if (left(@EmailSubject,6)='Reject')
		

			set @EmailBody = @EmailBody + '<br><br><br><a href="http://10.73.142.75/quality/C_Print_approved/print_report2_approved?var1='+ @hdrid +'&var2='+ @nik +'&var3='+ @name +'" > <b> Click to open the document</b> </a>'
			set @EmailBody = @EmailBody + '<br><br><br>		
			The email is automatically send by system.		
			<br><br>
			Kind Regards,
			<br><br><br>
			DMIA System
			<hr>'
		
		set @EmailBody = @EmailBody + '</body>
		</html>'
		
	
			
			set @EmailBody2 =@EmailBody
			set @EmailBody2 = replace(@EmailBody2,'varname',@name)

		/* ***** Jika pertama dan terakhir maka kirim kesemua orang ***** */
		/* ***** Selebihnya hanya khusus orang yang dituju ***** */
		
		EXEC msdb.dbo.sp_send_dbmail  
				@profile_name = 'QUALITY SYSTEM',  
				@recipients = @email,	
				@copy_recipients = @copy_to,
				@subject = @EmailSubject,
				@body_format = 'HTML',
				@body = @EmailBody2;
				
		FETCH NEXT FROM Send_Cursor
		
		Into @nama_supplier,@nomor_supplier,@part_name,@part_number,@tanggal_transaksi,@reason


	END

	CLOSE Send_Cursor
	DEALLOCATE Send_Cursor
	CLOSE Send_Cursor2
	DEALLOCATE Send_Cursor2
	CLOSE Send_Cursor3
	DEALLOCATE Send_Cursor3
	
	return 1

END
GO
USE [master]
GO
ALTER DATABASE [db_PCN] SET  READ_WRITE 
GO
